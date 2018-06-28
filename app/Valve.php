<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Valve extends Model
{
    protected $baseYearLetter = 'A';

    protected $fillable = [
        'serial',
        'customer',
        'territory',
    ];

    public function tests()
    {
        return $this->hasMany('App\Test');
    }

    public function findBySerial($serial)
    {
        return $this->where('serial', '=', $serial)->with('tests')->firstOrFail();
    }

    public function scopeInYear($query, $yearLetter)
    {
        return $query->where('serial', 'like', "%{$yearLetter}%")->count();
    }

    public static function boot()
    {
        parent::boot();

        // Attach event handler, on deleting of the user
        Valve::deleting(function ($valve) {
            // Delete all tricks that belong to this user
            foreach ($valve->tests as $test) {
                $test->delete();
            }
        });
    }

    public function storeValve($data)
    {
        $valve = self::create();

        $valve->serial = $this->generateSerial($valve->id);

        $valve->save();

        $valve->tests()->create([
            'opening_pressure' => $data['opening_pressure'],
            'opening_vacuum' => $data['opening_vacuum'],
            'unit' => $data['unit'],
            'notes' => $data['notes'],
        ]);

        return $valve->load('tests');
    }

    public function updateValve($data, $id)
    {
        $valve = $this->findBySerial($id);

        $valve->update($data);

        return $valve;
    }

    public function deleteValve($id)
    {
        $valve = $this->findBySerial($id);

        return $valve->delete();
    }

    private function generateSerial($id)
    {
        $baseYear = Carbon::create(2018, 1, 1, 0, 0, 0, 'Europe/London');
        $yearDiff = $baseYear->diffInYears();
        $yearLetter = $this->baseYearLetter;

        $valvesInYear = $this->inYear($yearLetter) + 1;

        for ($i = 0; $i < $yearDiff; ++$i) {
            ++$yearLetter;
        }

        return $yearLetter.sprintf('%04d', $valvesInYear);
    }
}

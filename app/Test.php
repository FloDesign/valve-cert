<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'opening_pressure',
        'opening_vacuum',
        'unit',
        'notes',
    ];

    public function valve()
    {
        return $this->belongsTo('App\Valve');
    }

    public function storeTest($data, Valve $valve)
    {
        $test = self::create([
            'opening_pressure' => $data['opening_pressure'],
            'opening_vacuum' => $data['opening_vacuum'],
            'unit' => $data['unit'],
            'notes' => $data['notes'],
        ]);

        return $valve->tests()->associate($test);
    }
}

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
        'valve_id',
    ];

    public function valve()
    {
        return $this->belongsTo('App\Valve');
    }

    public function getTestByUuid($id)
    {
        return $this->where('uuid', '=', $id)->firstOrFail();
    }

    public function storeTest($data, Valve $valve)
    {
        $test = self::create([
            'opening_pressure' => $data['opening_pressure'],
            'opening_vacuum' => $data['opening_vacuum'],
            'unit' => $data['unit'],
            'notes' => $data['notes'],
            'valve_id' => $valve->id,
        ]);

        return $test->load('valve');
    }
}

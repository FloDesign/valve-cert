<?php

use Illuminate\Database\Seeder;
use App\Valve;
use App\Test;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function __construct()
    {
        $this->filename = base_path().'/database/seeds/csvs/valves.csv';
    }

    public function assocGetcsv($csv_path)
    {
        $r = array_map('str_getcsv', file($csv_path));
        foreach ($r as $k => $d) {
            $r[$k] = array_combine($r[0], $r[$k]);
        }

        return array_values(array_slice($r, 1));
    }

    /**
     * Seed the application's database.
     */
    public function run()
    {
        DB::disableQueryLog();
        DB::table('valves')->truncate();
        DB::table('tests')->truncate();

        Valve::unguard();
        Test::unguard();

        $valves = $this->assocGetcsv($this->filename);

        foreach ($valves as $valve) {
            $createdValve = Valve::create([
                'serial' => $valve['serial'],
                'customer' => $valve['customer'],
                'territory' => $valve['territory'],
            ]);

            $createdValve->tests()->create([
                'opening_pressure' => $valve['opening_pressure'],
                'opening_vacuum' => $valve['opening_vacuum'],
                'unit' => $valve['unit'],
                'dispatch_date' => Carbon::createFromFormat('d-M-y', $valve['dispatch_date'] !== '' ? $valve['dispatch_date'] : '04-Jul-18'),
                'notes' => $valve['notes'],
                'created_at' => Carbon::createFromFormat('d-M-y', $valve['test_date'] !== '' ? $valve['test_date'] : '04-Jul-18'),
            ]);
        }
    }
}

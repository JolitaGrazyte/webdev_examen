<?php

use Illuminate\Database\Seeder;

class PeriodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('periods')->delete();

        $carbon = new \Carbon\Carbon();
        $format = 'Y-m-d H:i:s';
        $dur = 1;

        $p_start     = '2015-11-01 01:00:00';
//        $p_start     = $carbon->now()->subWeek(2);

//        dd($p_start);
        $periods = [];

        for($i = 1; $i<= 4; ++$i){

            if($i == 1){

                $periods[$i] =

                    [
                        'start' =>  $p_start,
//                        'end'   =>  $carbon->createFromFormat($format, $p_start)->addWeek($dur)->toDateTimeString()
                        'end'   =>  $carbon->createFromFormat($format, $p_start)->addDays(4)->toDateTimeString()

                    ];


            }
            else {

                $periods[$i] =

                    [
                        'start' =>  $periods[($i-1)]['end'],
//                        'end'   =>  $carbon->createFromFormat($format, $periods[($i-1)]['end'])->addWeek($dur)->toDateTimeString()
                    'end'   =>  $carbon->createFromFormat($format, $periods[($i-1)]['end'])->addDays(4)->toDateTimeString()
                    ];

            }

        }


        DB::table('periods')->insert($periods);
    }
}

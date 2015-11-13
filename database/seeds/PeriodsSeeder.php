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
        $dur = 5;

        $p_start     = '2015-11-01 15:00:00';
        $periods = [];

        for($i = 1; $i<= 4; ++$i){

            if($i == 1){

                $periods[$i] =

                    [
                        'start' =>  $p_start,
                        'end'   =>  $carbon->createFromFormat($format, $p_start)->addDays($dur)

                    ];


            }

               else{
                   $periods[$i] =

                       [
                           'start' =>  $periods[($i-1)]['end'],
                           'end'   =>  $carbon->createFromFormat($format, $periods[($i-1)]['end'])->addDays($dur)
                       ];

               }
        }


        DB::table('periods')->insert($periods);
    }
}

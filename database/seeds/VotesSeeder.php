<?php

use Illuminate\Database\Seeder;

//use App\Database\Seeds\FileParse;

class VotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('votes')->delete();

//        $file = storage_path('app').'/files/votes.csv';
//        $votes = FileParse::parse_csv($file);
//        DB::table('votes')->insert($votes);

        factory(App\Votes::class, 200)->create();
    }
}

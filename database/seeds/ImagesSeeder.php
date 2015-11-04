<?php

use Illuminate\Database\Seeder;

use App\Database\Seeds\FileParse;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->delete();

        $file = storage_path('app').'/files/images.csv';

        $images = FileParse::parse_csv($file);

        DB::table('images')->insert($images);

    }
}

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

        $users = \App\User::all();

        $db_images = \App\Image::all();

        foreach ($db_images as $key => $img ) {

//            $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2015-11-'.mt_rand(1, 5).' '.mt_rand(0, 24).':00:00');
            $user = $users[$key+1];

            $img->ip            = $user->ip;
            $img->user_id       = $user->id;
            $img->created_at    = $user->created_at;
            $img->updated_at    = $user->updated_at;

            $img->save();

        }

    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $ip = inet_pton('10.168.56.1');
        $ip = '10.168.56.1';
//        dd($ip);


        DB::table('users')->delete();
        $users = [

            [
                'username'      => 'admin',
                'first_name'    => 'Jolita',
                'last_name'     => 'Grazyte',
                'email'         => 'jolita.grazyte@student.kdg.be',
                'password'      => Hash::make('testing'),
                'role'          => 0,
                'ip'            => $ip

            ]
        ];
        DB::table('users')->insert($users);

        factory(User::class, 25)->create();
    }
}

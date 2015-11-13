<?php

use Illuminate\Database\Seeder;

class SeedOnlyAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $ip = '10.168.56.1';

        DB::table('users')->delete();
        $users = [

            [
                'username'      => 'admin',
                'email'         => 'test@test.be',
                'password'      => Hash::make('test'),
                'role'          => 0,
                'ip'            => $ip

            ]
        ];
        DB::table('users')->insert($users);


    }
}

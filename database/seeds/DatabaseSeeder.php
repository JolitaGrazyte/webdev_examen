<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder
{
    /**
     * Database tables we want to seed.
     * @var array
     */
    protected $tables = [
        'users',
        'images',
        'votes',
        'periods'

    ];

    /**
     * Classes to seed.
     * @var array
     */
    protected $seeders = [

        'UsersSeeder',
        'ImagesSeeder',
        'VotesSeeder',
        'PeriodsSeeder'

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Model::unguard();

        // clean the database
        $this->cleanDatabase();

        // seed all the specified classes
        foreach($this->seeders as $seedClass)
        {
            $this->call($seedClass);
        }

        Model::reguard();
    } // end run() fn


    /**
     * Method to clean the database. Running before seeding.
     */
    private function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach($this->tables as $table)
        {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    } // end cleanDatabase() fn
}

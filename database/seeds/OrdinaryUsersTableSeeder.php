<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('OrdinaryUsersTableSeeder');

        $this->command->info('OrdinaryUsers table seeded!');
    }

}

class OrdinaryUsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('OrdinaryUsers')->delete();

        OrdinaryUser::create(array('email' => ''));
    }

}

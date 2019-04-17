<?php
class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('UsersTableSeeder');

        $this->command->info('Users table seeded!');
    }

}

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array('email' => ''));
    }

}

<?php
class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('TherapistsTableSeeder');

        $this->command->info('Therapists table seeded!');
    }

}

class TherapistsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array('email' => ''));
    }

}

<?php
class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('AppointmentsTableSeeder');

        $this->command->info('Appointment table seeded!');
    }

}

class AppointmentsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('Appointments')->delete();

        appointments::create(array('id' => ''));
    }

}

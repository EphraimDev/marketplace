<?php
use Illuminate\Database\Seeder;

class AppointmentsTableSeeder extends Seeder {

    public function run()
    {
        factory(App\Appointment::class, 30)->create();
    }

}

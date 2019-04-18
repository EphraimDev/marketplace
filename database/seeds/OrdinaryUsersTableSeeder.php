<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        // factory(App\User::class, 30)->create();
       factory(App\Therapist::class, 30)->create();


        $this->call('OrdinaryUsersTableSeeder');

        $this->command->info('OrdinaryUsers table seeded!');
    }

}

class OrdinaryUsersTableSeeder extends Seeder {

    public function run()
    {
     //   DB::table('OrdinaryUsers')->delete();

       // OrdinaryUser::create(array('email' => ''));

    }

}

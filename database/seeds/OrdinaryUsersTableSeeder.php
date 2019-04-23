<?php
use Illuminate\Database\Seeder;

class OrdinaryUsersTableSeeder extends Seeder {

    public function run()
    {
        factory(App\User::class, 15)->create(['role'=>'ordinary-user']);
    }
}

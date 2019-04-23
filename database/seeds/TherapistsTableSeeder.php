<?php
use Illuminate\Database\Seeder;

class TherapistsTableSeeder extends Seeder {

    protected $noTherapist = 15;

    public function run()
    {   
        $this->clearFiles();

        $therapists = factory(App\Therapist::class, $this->noTherapist)->create();
        
        $therapists->each(function($therapist){
            factory(App\Verifications::class)->create(
                ['therapist_id'=>$therapist->id]
            );

            factory('App\Verifications')->states('licenseImage')->create(
                ['therapist_id'=>$therapist->id]
            );
        });
    }

    protected function clearFiles()
    {
        $files = Storage::files('verification');

        Storage::delete($files);
    }
}

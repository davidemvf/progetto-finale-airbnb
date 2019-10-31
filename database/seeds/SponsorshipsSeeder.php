<?php

use Illuminate\Database\Seeder;
use App\Sponsorship;
use App\Apartment;

class SponsorshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sponsorship::class, 50)
                -> create()
                -> each(function($sponsorship) {
                  $apartments = Apartment::inRandomOrder() -> take(rand(0, 10)) -> get(); //da rivedere numero rand
                  $sponsorship -> apartments() -> attach($apartments);
                });
    }
}

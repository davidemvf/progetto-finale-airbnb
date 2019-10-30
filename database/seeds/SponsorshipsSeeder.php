<?php

use Illuminate\Database\Seeder;
use App\Sponsorship;

class SponsorshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sponsorship::class, 50) -> create(); 
    }
}

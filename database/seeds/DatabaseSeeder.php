<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ApartmentsSeeder::class);
        $this->call(MessagesSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(SponsorshipsSeeder::class);
        $this->call(PaymentsSeeder::class);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Payment;
use App\Apartment;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Payment::class, 50)
              -> create()
              -> each(function($payment) {
                $apartments = Apartment::inRandomOrder() -> take(rand(0, 10)) -> get(); //da rivedere numero rand
                $payment -> apartments() -> attach($apartments);
              });
    }
}

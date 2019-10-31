<?php

use Illuminate\Database\Seeder;
use App\Service;
use App\Apartment;

class ServicesSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    factory(Service::class, 200)
            -> create()
            -> each(function($service) {
                $apartments = Apartment::inRandomOrder() -> take(rand(1, 6)) -> get();
                $service -> apartments() -> attach($apartments);
            });
  }
}

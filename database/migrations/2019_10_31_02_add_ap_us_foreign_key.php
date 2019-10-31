<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApUsForeignKey extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('apartments', function (Blueprint $table) {

      $table -> bigInteger('user_id') -> unsigned() -> index();
      $table -> foreign('user_id', 'user')
             -> references('id')
             -> on('users');
    });

    Schema::table('apartment_service', function (Blueprint $table) {

      $table -> bigInteger('apartment_id') -> unsigned() -> index();
      $table -> foreign('apartment_id', 'apartment_service_apartment')
             -> references('id')
             -> on('apartments');

      $table -> bigInteger('service_id') -> unsigned() -> index();
      $table -> foreign('service_id', 'apartment_service_service')
             -> references('id')
             -> on('services');
    });

    Schema::table('apartment_sponsorship', function (Blueprint $table) {

      $table -> bigInteger('apartment_id') -> unsigned() -> index();
      $table -> foreign('apartment_id', 'apartment_sponsorship_apartment')
             -> references('id')
             -> on('apartments');

      $table -> bigInteger('sponsorship_id') -> unsigned() -> index();
      $table -> foreign('sponsorship_id', 'apartment_sponsorship_sponsorship')
             -> references('id')
             -> on('sponsorships');
    });


  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::table('apartments', function (Blueprint $table) {

      $table -> dropForeign('user');
      $table -> dropColumn('user_id');
    });

    Schema::table('apartment_service', function (Blueprint $table) {

      $table -> dropForeign('apartment_service_apartment');
      $table -> dropColumn('apartment_id');

      $table -> dropForeign('apartment_service_service');
      $table -> dropColumn('service_id');
    });

    Schema::table('apartment_sponsorship', function (Blueprint $table) {

      $table -> dropForeign('apartment_sponsorship_apartment');
      $table -> dropColumn('apartment_id');

      $table -> dropForeign('apartment_sponsorship_sponsorship');
      $table -> dropColumn('sponsorship_id');
    });
  }
}

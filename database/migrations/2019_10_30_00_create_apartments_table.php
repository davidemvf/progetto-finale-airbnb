<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('desc');
            $table->integer('rooms');
            $table->integer('beds');
            $table->integer('toilettes');
            $table->integer('square_meters');
            $table->string('city') -> nullable();
            $table->string('prov') -> nullable();
            $table->string('cap') -> nullable();
            $table->string('address') -> nullable();
            $table->decimal('lat', 9, 6) -> nullable();
            $table->decimal('long', 9, 6) -> nullable();
            $table->string('img') -> nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}

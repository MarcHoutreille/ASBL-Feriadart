<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('open')->default('0');
            $table->dateTime('date_start', $precision = 0);
            $table->dateTime('date_end', $precision = 0);
            $table->string('name', 128);
            $table->string('slug', 128)->unique();
            $table->string('img_src', 256);
            $table->text('description');
            $table->string('inscription_img', 256);
            $table->text('inscription_txt');
            $table->string('place', 128);
            $table->string('address', 128);
            $table->string('telephone', 128);
            $table->string('email', 128);
            $table->string('url', 128);
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
        Schema::dropIfExists('events');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->boolean('accepted')->default('0');
            $table->string('fname',64);
            $table->string('lname',64);
            $table->text('bio');
            $table->text('products');
            $table->string('telephone',128);
            $table->string('email',128);
            $table->string('url',128)->nullable();
            $table->string('facebook',128)->nullable();
            $table->string('instagram',128)->nullable();
            $table->string('img_01',256);
            $table->string('img_02',256)->nullable();
            $table->string('img_03',256)->nullable();
            $table->string('img_04',256)->nullable();
            $table->string('img_05',256)->nullable();
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
        Schema::dropIfExists('inscriptions');
    }
}

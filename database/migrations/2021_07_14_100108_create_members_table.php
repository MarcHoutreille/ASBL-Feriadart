<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('fname', 128);
            $table->string('lname', 128);
            $table->string('title', 128);
            $table->text('bio');
            $table->string('img_src', 256);
            $table->string('email', 128);
            $table->string('url', 256)->nullable();
            $table->string('facebook', 256)->nullable();
            $table->string('instagram', 256)->nullable();
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
        Schema::dropIfExists('members');
    }
}

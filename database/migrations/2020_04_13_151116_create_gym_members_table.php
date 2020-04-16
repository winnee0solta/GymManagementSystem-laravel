<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGymMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gym_members', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('fullname');
            $table->string('dob');
            $table->string('phone');
            $table->string('address');
            $table->string('e_phone');
            $table->string('shift');
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
        Schema::dropIfExists('gym_members');
    }
}

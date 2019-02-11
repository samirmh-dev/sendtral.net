<?php
/**
 * Copyright (C) SAFAROFF Agency - All Rights Reserved
 *
 * This file is part of ARDS project
 * Unauthorized copying of this file, via any medium is strictly prohibited
 *
 * Written by Samir Mammadhasanov <samirmh00@gmail.com>, 2018
 *
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}

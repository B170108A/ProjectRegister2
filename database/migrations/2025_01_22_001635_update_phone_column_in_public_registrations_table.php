<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('public_registrations', function (Blueprint $table) {
            $table->string('phone')->nullable()->change(); // Allow NULL values
        });
    }

    public function down()
    {
        Schema::table('public_registrations', function (Blueprint $table) {
            $table->string('phone')->nullable(false)->change(); // Revert to NOT NULL
        });
    }

};

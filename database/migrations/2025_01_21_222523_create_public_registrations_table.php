<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('public_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('lucky_draw_number')->unique()->change();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('public_registrations', function (Blueprint $table) {
        $table->string('lucky_draw_number')->change(); // Remove unique constraint
    });
}
};

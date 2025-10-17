<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nomination_id')->constrained();
            $table->string('school');
            $table->unsignedTinyInteger('mrsd');
            $table->foreignId('area_id')->constrained()->cascadeOnDelete();
            $table->string('link')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('orders');
    }
};

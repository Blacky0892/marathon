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
        Schema::table('values', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
        });
        Schema::table('programs', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
        });
        Schema::dropIfExists('orders');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
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
        Schema::table('values', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete();
        });
        Schema::table('programs', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete();
        });
    }
};

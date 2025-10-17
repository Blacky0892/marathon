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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->tinyInteger('stage')->default(2);
            $table->foreignId('school_id')->nullable()->constrained()->nullOnDelete();
            $table->unsignedTinyInteger('mrsd')->default(0);
            $table->foreignId('area_id')->constrained()->cascadeOnDelete();
            $table->string('class')->nullable();
            $table->integer('count_student')->nullable();
            $table->integer('count_adult')->nullable();
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('values', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
        });
        Schema::table('programs', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
        });
        Schema::dropIfExists('orders');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('baiviet', function (Blueprint $table) {
            $table->increments('ma_bviet');
            $table->string('tieude', 200);
            $table->string('ten_bhat', 200);
            $table->unsignedInteger('ma_tloai');
            $table->text('tomtat');
            $table->text('noidung')->nullable();
            $table->unsignedInteger('ma_tgia');
            $table->dateTime('ngayviet')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('hinh',200)->nullable();
            $table->foreign('ma_tloai')->references('ma_tloai')->on('theloai')->onDelete('cascade');
            $table->foreign('ma_tgia')->references('ma_tgia')->on('tacgia')->onDelete('cascade');
        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baiviet');
    }
};

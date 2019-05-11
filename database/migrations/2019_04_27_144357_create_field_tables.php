<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldTables extends Migration
{
    public function up()
    {
        Schema::create('field', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_lapangan');
            $table->string('alamat_lapangan');
            $table->string('harga_lapangan');
            $table->string('foto_lapangan_utama');
            $table->string('foto_lapangan_1');
            $table->string('foto_lapangan_2');
            $table->string('foto_lapangan_3');
            $table->string('foto_lapangan_4');
            $table->string('deskripsi_lapangan');
            $table->timestamps();
        });

        Schema::create('schedule', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lapangan_id');
            $table->date('tgl_tersedia');
            $table->string('jam_tersedia');
            $table->string('tersedia');
            $table->timestamps();
        });

        Schema::create('order_temp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('schedule_id');
            $table->string('user_id');
            $table->integer('harga_utama');
            $table->timestamps();
        });

        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('schedule_id');
            $table->string('user_id');
            $table->dateTime('tgl_pesan');
            $table->dateTime('tgl_bayar');
            $table->dateTime('tgl_jatuh_tempo_bayar');
            $table->integer('harga_utama');
            $table->integer('harga_bayar');
            $table->string('status_bayar');
            $table->string('status_pesan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('field_tables');
    }
}

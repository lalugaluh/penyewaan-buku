<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->string('id', 5)->primary();
            $table->string('name_lengkap', 25);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('email', 150);
            $table->string('alamat', 50);
        });

        Schema::create('buku', function (Blueprint $table) {
            $table->string('kb', 5)->primary();
            $table->string('nama_buku', 25);
            $table->string('penerbit', 250);
            $table->string('penulis', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
        Schema::dropIfExists('user');
    }
}

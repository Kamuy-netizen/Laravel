<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Pastikan kolom 'name' ada
            $table->text('deskripsi'); // Pastikan kolom 'deskripsi' ada
            $table->string('image'); // Pastikan kolom 'image' ada
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
}

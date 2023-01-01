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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id');
            $table->string('nama', 50);
            $table->text('alamat');
            $table->string('no_handphone', 14);
            $table->string('gender');
            $table->string('no_kendaraan', 10);
            $table->string('merek_kendaraan', 20);
            $table->string('model_kendaraan', 20);
            $table->text('kerusakan');
            $table->string('photo_kendaraan');
            $table->string('status')->nullable();
            $table->integer('total_harga')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftaran');
    }
};

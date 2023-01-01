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
        Schema::create('data_service', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_pendaftaran');
            $table->string('nama_mekanik')->nullable();
            $table->bigInteger('jasa_service')->nullable();
            $table->bigInteger('harga_total')->nullable();
            $table->text('listSperpat')->nullable();
            $table->string('kerusakan')->nullable();

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
        Schema::dropIfExists('data_service');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->integer('no_po');
            $table->string('nama_supplier');
            $table->string('judul_po');
            $table->integer('nilai_po');
            $table->string('nilai_po_curr');
            // $table->integer('nilai_impor');
            $table->integer('total_shipment');
            $table->integer('total_nilai_import');
            $table->string('remaining_amount');
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
        Schema::dropIfExists('transaksis');
    }
}

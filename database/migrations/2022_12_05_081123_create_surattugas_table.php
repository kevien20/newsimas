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
        Schema::create('surattugas', function (Blueprint $table) {
            $table->id();
            $table->string('klasifikasi');
            $table->string('kodesurat');
            $table->text('maksudsurat');
            $table->date('awaltugas');
            $table->date('akhirtugas');
            $table->string('beban');
            $table->string('matang');
            $table->date('tglsurat');
            $table->string('tte');
            $table->string('penandatangan');
            $table->string('kuasa');
            $table->string('ppk');
            $table->string('transport');
            $table->string('tujuan');
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
        Schema::dropIfExists('surattugas');
    }
};

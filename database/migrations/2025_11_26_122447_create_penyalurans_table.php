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
        Schema::create('penyalurans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_penyaluran')->unique();
            // Relasi ke mustahiqs
            $table->foreignId('mustahiq_id')->constrained('mustahiqs')->onDelete('cascade');
            // Relasi ke users (amil yang input)
            $table->foreignId('user_id')->constrained('users');
            
            $table->string('jenis_bantuan'); // Misal: Beras 5kg, Uang Tunai
            $table->decimal('nominal', 15, 2);
            $table->text('keterangan')->nullable();
            $table->date('tanggal_penyaluran');
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
        Schema::dropIfExists('penyalurans');
    }
};

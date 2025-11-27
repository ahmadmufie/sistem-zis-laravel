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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi')->unique(); // Contoh: TRX-001
            // Relasi ke tabel muzakkis
            $table->foreignId('muzakki_id')->constrained('muzakkis')->onDelete('cascade');
            // Relasi ke tabel users (siapa amil yang input)
            $table->foreignId('user_id')->constrained('users'); 
            
            $table->enum('jenis_transaksi', ['zakat_fitrah', 'zakat_mal', 'infaq', 'sedekah']);
            $table->decimal('nominal', 15, 2); // Angka besar dengan 2 desimal
            $table->text('keterangan')->nullable();
            $table->date('tanggal_transaksi');
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
};

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckShopStatus extends Command
{
    /**
     * Nama dan argumen perintah yang dipanggil di terminal.
     */
    protected $signature = 'pos:status {jam?}';

    /**
     * Deskripsi perintah.
     */
    protected $description = 'Mengecek status operasional Toko Kelontong POS';

    /**
     * Logika utama yang dijalankan oleh perintah.
     */
    public function handle()
    {
        // Menanyakan nama kasir
        $namaKasir = $this->ask('Masukkan nama Anda: ');

        // Jika jam tidak diisi, menggunakan jam 10
        $jam = $this->argument('jam') ?? 10;

        $this->info("=== SISTEM MONITORING TOKO KELONTONG ===");

        // Toko buka dari jam 08:00 sampai 21:00
        if ($jam >= 8 && $jam <= 21) {
            $this->info("Status Toko pada jam $jam:00 WIB adalah: BUKA");
            $this->comment("Silakan kasir bersiap di meja transaksi.");
        } else {
            $this->error("Status Toko pada jam $jam:00 WIB adalah: TUTUP");
            $this->warn("Akses transaksi kasir dinonaktifkan sementara.");
        }
    }
}

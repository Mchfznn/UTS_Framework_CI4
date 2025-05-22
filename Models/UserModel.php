<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // KONFIGURASI DASAR DATABASE
    protected $table            = 'users';       // Nama tabel yang terkait
    protected $primaryKey       = 'id';          // Kolom primary key
    protected $useAutoIncrement = true;          // Menggunakan auto-increment untuk ID
    protected $returnType       = 'array';       // Format hasil query sebagai array
    protected $useSoftDeletes   = false;         // Tidak menggunakan soft delete
    protected $protectFields    = true;          // Proteksi mass assignment
    protected $allowedFields    = ['username', 'password']; // Field yang boleh diisi

    // PENGATURAN OPERASI DATABASE
    protected bool $allowEmptyInserts = false;   // Melarang insert data kosong
    protected bool $updateOnlyChanged = true;    // Hanya update field yang berubah

    // TYPE CASTING (Konversi tipe data otomatis)
    protected array $casts = [];                // Definisi casting tipe data
    protected array $castHandlers = [];         // Custom handler untuk casting

    // PENGATURAN TIMESTAMP
    protected $useTimestamps = false;           // Tidak menggunakan timestamp otomatis
    protected $dateFormat    = 'datetime';      // Format penyimpanan tanggal
    protected $createdField  = 'created_at';    // Kolom creation date (tidak aktif)
    protected $updatedField  = 'updated_at';    // Kolom update date (tidak aktif)
    protected $deletedField  = 'deleted_at';    // Kolom soft delete (tidak aktif)

    // VALIDASI DATA
    protected $validationRules      = [];       // Rules validasi (kosong = tidak divalidasi)
    protected $validationMessages   = [];       // Pesan error kustom
    protected $skipValidation       = false;    // Validasi tetap dijalankan
    protected $cleanValidationRules = true;     // Membersihkan rules sebelum validasi

    // CALLBACKS (Hook untuk operasi database)
    protected $allowCallbacks = true;           // Mengaktifkan sistem callback
    protected $beforeInsert   = [];             // Hook sebelum insert data
    protected $afterInsert    = [];             // Hook setelah insert data
    protected $beforeUpdate   = [];             // Hook sebelum update data
    protected $afterUpdate    = [];             // Hook setelah update data
    protected $beforeFind     = [];             // Hook sebelum query find
    protected $afterFind      = [];             // Hook setelah query find
    protected $beforeDelete   = [];             // Hook sebelum delete data
    protected $afterDelete    = [];             // Hook setelah delete data
}
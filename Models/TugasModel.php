<?php

namespace App\Models;

use CodeIgniter\Model;

class TugasModel extends Model
{
    // Konfigurasi dasar database
    protected $table            = 'tugas';       // Nama tabel yang terkait
    protected $primaryKey       = 'id';          // Primary key tabel
    protected $useAutoIncrement = true;          // Menggunakan auto-increment untuk primary key
    protected $returnType       = 'array';       // Format hasil query (array/object)
    protected $useSoftDeletes   = false;         // Tidak menggunakan soft delete
    protected $protectFields    = true;          // Melindungi field dari mass assignment
    protected $allowedFields    = ['judul', 'deskripsi', 'deadline', 'status', 'user_id']; // Field yang boleh diisi

    // Pengaturan operasi database
    protected bool $allowEmptyInserts = false;   // Melarang insert data kosong
    protected bool $updateOnlyChanged = true;    // Hanya update field yang berubah

    // Type casting untuk field
    protected array $casts = [];
    protected array $castHandlers = [];

    // Pengaturan timestamp
    protected $useTimestamps = false;            // Tidak menggunakan automatic timestamp
    protected $dateFormat    = 'datetime';       // Format tanggal yang digunakan
    protected $createdField  = 'created_at';    // Field untuk creation date (tidak aktif)
    protected $updatedField  = 'updated_at';    // Field untuk update date (tidak aktif)
    protected $deletedField  = 'deleted_at';    // Field untuk soft delete (tidak aktif)

    // Validasi data
    protected $validationRules      = [];       // Rules validasi (kosong = tidak ada validasi)
    protected $validationMessages   = [];       // Pesan error validasi
    protected $skipValidation       = false;    // Tidak melewati validasi
    protected $cleanValidationRules = true;     // Membersihkan rules sebelum validasi

    // Callbacks untuk hook database operation
    protected $allowCallbacks = true;           // Mengaktifkan callback
    protected $beforeInsert   = [];             // Hook sebelum insert data
    protected $afterInsert    = [];             // Hook setelah insert data
    protected $beforeUpdate   = [];             // Hook sebelum update data
    protected $afterUpdate    = [];             // Hook setelah update data
    protected $beforeFind     = [];             // Hook sebelum query find
    protected $afterFind      = [];             // Hook setelah query find
    protected $beforeDelete   = [];             // Hook sebelum delete data
    protected $afterDelete    = [];             // Hook setelah delete data
}
<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller {
    // Menangani proses login user
    public function login() {
        helper(['form']); // Memuat helper form untuk validasi
        // Cek jika request menggunakan method POST (form submission)
        if ($this->request->getMethod() === 'post') {
            $model = new UserModel();
            // Mencari user berdasarkan username
            $user = $model->where('username', $this->request->getPost('username'))->first();
            
            // Verifikasi password dan autentikasi
            if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
                // Set session data jika login berhasil
                session()->set([
                    'user_id' => $user['id'],
                    'username' => $user['username']
                ]);
                return redirect()->to('/tugas'); // Redirect ke halaman tugas
            }
            // Redirect kembali dengan pesan error jika gagal
            return redirect()->back()->with('error', 'Login gagal');
        }
        // Menampilkan form login untuk request GET
        return view('auth/login');
    }

    // Menangani proses registrasi user baru
    public function register() {
        helper(['form']); // Memuat helper form untuk validasi
        // Cek jika request menggunakan method POST (form submission)
        if ($this->request->getMethod() === 'post') {
            $model = new UserModel();
            // Membuat data user dengan password yang di-hash
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];
            $model->insert($data); // Menyimpan user baru ke database
            return redirect()->to('/login'); // Redirect ke halaman login
        }
        // Menampilkan form registrasi untuk request GET
        return view('auth/register');
    }

    // Menangani proses logout user
    public function logout() {
        session()->destroy(); // Menghapus semua data session
        return redirect()->to('/login'); // Redirect ke halaman login
    }
}
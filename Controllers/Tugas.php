<?php

namespace App\Controllers;
use App\Models\TugasModel;
use CodeIgniter\Controller;

class Tugas extends Controller {
    
    // Menampilkan daftar tugas milik user yang sedang login
    public function index() {
        $model = new TugasModel();
        // Mengambil data tugas berdasarkan user_id dari session
        $data['tugas'] = $model->where('user_id', session()->get('user_id'))->findAll();
        // Menampilkan view index dengan data tugas
        return view('tugas/index', $data);
    }

    // Menangani proses penambahan tugas baru
    public function tambah() {
        // Cek jika request menggunakan method POST (form submission)
        if ($this->request->getMethod() === 'post') {
            $model = new TugasModel();
            // Menyimpan data baru dengan menyertakan user_id dari session
            $model->save([
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'deadline' => $this->request->getPost('deadline'),
                'status' => $this->request->getPost('status'),
                'user_id' => session()->get('user_id'),  // Mengikat tugas ke user
            ]);
            // Redirect ke halaman daftar tugas setelah berhasil tambah
            return redirect()->to('/tugas');
        }
        // Menampilkan form tambah tugas untuk request GET
        return view('tugas/tambah');
    }

    // Menangani proses edit tugas
    public function edit($id) {
        $model = new TugasModel();
        // Cek jika request menggunakan method POST (form submission)
        if ($this->request->getMethod() === 'post') {
            // Update data tugas berdasarkan ID
            $model->update($id, [
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'deadline' => $this->request->getPost('deadline'),
                'status' => $this->request->getPost('status'),
            ]);
            // Redirect ke halaman daftar tugas setelah berhasil edit
            return redirect()->to('/tugas');
        }
        // Mengambil data tugas yang akan diedit untuk ditampilkan di form
        $data['tugas'] = $model->find($id);
        // Menampilkan form edit dengan data tugas
        return view('tugas/edit', $data);
    }

    // Menangani penghapusan tugas berdasarkan ID
    public function hapus($id) {
        $model = new TugasModel();
        // Menghapus data tugas dari database
        $model->delete($id);
        // Redirect ke halaman daftar tugas setelah berhasil hapus
        return redirect()->to('/tugas');
    }
}
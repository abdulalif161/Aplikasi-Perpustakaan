<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';
    public $nama, $email, $password, $id, $cari;

    public function render()
    {
        $layout['title'] = 'Kelola User';

        if ($this->cari != '') {
            $data['user'] = User::where('nama', 'like', '%' . $this->cari . '%')
                ->orWhere('email', 'like', '%' . $this->cari . '%')
                ->paginate(10);
        } else {
            $data['user'] = User::paginate(10);
        }

        return view('livewire.user-component', $data)->layoutData($layout);
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email', // Tambah validasi unik
            'password' => 'required|min:6', // Password minimal 6 karakter
        ], [
            'nama.required' => 'Nama Tidak Boleh Kosong!',
            'email.required' => 'Email Tidak Boleh Kosong!',
            'email.email' => 'Format Email Salah!',
            'email.unique' => 'Email sudah digunakan!',
            'password.required' => 'Password Tidak Boleh Kosong!',
            'password.min' => 'Password minimal 6 karakter!',
        ]);

        User::create([
            'nama' => $this->nama,
            'email' => $this->email,
            'password' => bcrypt($this->password), // Hash password sebelum disimpan
            'jenis' => 'admin',
        ]);

        session()->flash('success', 'Berhasil Simpan!');
        $this->reset();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); // Gunakan findOrFail agar error lebih jelas
        $this->id = $user->id;
        $this->nama = $user->nama;
        $this->email = $user->email;
    }

    public function update()
    {
        $user = User::findOrFail($this->id);

        // Jika tidak mengubah password
        if ($this->password == '') {
            $user->update([
                'nama' => $this->nama,
                'email' => $this->email,
            ]);
        } else {
            $user->update([
                'nama' => $this->nama,
                'email' => $this->email,
                'password' => bcrypt($this->password), // Hash password sebelum update
            ]);
        }

        session()->flash('success', 'Berhasil Ubah!');
        $this->reset();
    }

    public function confirm($id)
    {
        $this->id = $id;
    }

    public function destroy()
    {
        $user = User::findOrFail($this->id);
        $user->delete();

        session()->flash('success', 'Berhasil Hapus!');
        $this->reset();
    }
}

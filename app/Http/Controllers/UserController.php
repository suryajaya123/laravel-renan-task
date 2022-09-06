<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // menampilkan semua user
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('admin.users', compact('users'));
    }

    // menampilkan halaman tambah user
    public function addUser()
    {
        return view('admin.users_add');
    }

    // menambahkan user ke dalam database
    public function storeUser(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect('/admin/users');
    }

    // menampilkan halaman edit
    public function editUser($id)
    {
        $user = User::find($id);
        return view('admin.users_edit', compact('user'));
    }

    // melakukan update data di database
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->update();
        return redirect()->back();
    }

    // menghapus data dari function
    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
}

@extends('admin.app')

@section('content')

<h3>Add User</h3>

<form action="/admin/users/store" method="post">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Enter user name">
    </div>
    <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Enter email">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Enter user password">
    </div>
    <div class="form-group">
        <select name="role" class="form-control">
            <option value="admin">Admin</option>
            <option value="editor">Editor</option>
        </select>
    </div>
    <div class="form-group">
        <button class="form-button">Create User</button>
    </div>
</form>

@endsection
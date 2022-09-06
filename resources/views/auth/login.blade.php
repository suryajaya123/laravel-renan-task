@extends('layout')

@section('content')

<h3>Masuk kedalam aplikasi</h3>
@if(session('error'))
<p>{{ session('error') }}</p>
@endif
<form action="/login/submit" method="post">
    @csrf
    <div class="form-group">
        <input class="form-control" type="email" name="email" placeholder="Enter email address" required>
    </div>
    <div class="form-group">
        <input class="form-control"  type="password" name="password" placeholder="Enter password" required>
    </div>
    <div class="form-group">
        <button class="form-button"  type="submit">Login</button>
    </div>
</form>

@endsection
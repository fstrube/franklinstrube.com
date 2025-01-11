@extends('layouts.admin-auth')

@section('title', 'Login')

@section('body.class', 'login')

@section('main')
    <form action="" method="POST">
        {{ csrf_field() }}

        <label>Email Address</label>
        <input name="email" type="email" />

        <label>Password</label>
        <input name="password" type="password" />

        <button class="primary">Login</button>

        <section class="messages">
            @foreach ($errors->all() as $error)
                <div class="error">{{ $error }}</div>
            @endforeach
        </section>
    </form>
@endsection
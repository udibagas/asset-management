@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Login</h1>

    @error('email')
        <div class="text-error my-8">{{ $message }}</div>
    @enderror

    <form action="" method="POST" class="w-full flex flex-col space-y-4">
        @csrf
        <div class="flex flex-col space-y-2">
            <label for="email" class="block text-sm font-medium">Email</label>
            <input type="email" id="email" name="email" class="input" required value="{{ old('email') }}">
        </div>
        <div class="flex flex-col space-y-2">
            <label for="password" class="block text-sm font-medium">Password</label>
            <input type="password" id="password" name="password" class="input" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>

        <div class="mt-4 text-center">
            <a href="{{ route('register') }}" class="text-sm text-blue-600 hover:underline">Don't have an account?
                Register</a>
        </div>
    </form>

@endsection

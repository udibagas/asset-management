@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Register</h1>

    <form method="POST" class="flex flex-col space-y-4">
        @csrf
        <div class="flex flex-col space-y-2">
            <label for="name" class="block text-sm font-medium">Fullname</label>
            <input type="text" id="name" name="name" class="input @error('name') text-error @enderror" required
                value="{{ old('name') }}">
            @error('name')
                <div class="text-error mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex flex-col space-y-2">
            <label for="gender" class="block text-sm font-medium">Gender</label>
            <select id="gender" name="gender" class="input @error('gender') text-error @enderror" required>
                <option value="">Select Gender</option>
                <option value="M" @if (old('gender') === 'M') selected @endif>Male</option>
                <option value="F" @if (old('gender') === 'F') selected @endif>Female</option>
            </select>
            @error('gender')
                <div class="text-error mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex flex-col space-y-2">
            <label for="email" class="block text-sm font-medium">Email</label>
            <input type="email" id="email" name="email" class="input @error('email') text-error @enderror" required
                value="{{ old('email') }}">
            @error('email')
                <div class="text-error mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex flex-col space-y-2">
            <label for="password" class="block text-sm font-medium">Password</label>
            <input type="password" id="password" name="password" class="input @error('password') text-error @enderror"
                required>
            @error('password')
                <div class="text-error mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex flex-col space-y-2">
            <label for="password_confirmation" class="block text-sm font-medium">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="input @error('password') text-error @enderror" required>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>

        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">Already have an account?
                Login</a>
        </div>
    </form>
@endsection

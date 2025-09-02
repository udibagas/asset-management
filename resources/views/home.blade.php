@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <h1 class="text-3xl mb-8 text-center">Selamat Datang</h1>

    <form class="flex gap-4 mb-8 justify-center bg-base-200 p-4 rounded-lg">
        <input type="text" class="input" name="search" placeholder="Cari Asset..." value="{{ $request->search }}">
        <select id="category" name="category_id" class="select">
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $request->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}</option>
            @endforeach
        </select>

        <select id="location" name="location_id" class="select">
            <option value="">-- Pilih Lokasi --</option>
            <?php foreach ($locations as $location): ?>
            <option value="{{ $location->id }}" {{ $request->location_id == $location->id ? 'selected' : '' }}>
                {{ $location->name }}</option>
            <?php endforeach; ?>
        </select>
        <button class="btn btn-primary" type="submit">Filter</button>
        <a href="/" class="btn btn-primary btn-outline" type="reset">Reset</a>
    </form>

    <div class="flex gap-8 flex-wrap items-center justify-center">
        @foreach ($assets as $asset)
            <x-product-card :$asset></x-product-card>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $assets->links() }}
    </div>
@endsection

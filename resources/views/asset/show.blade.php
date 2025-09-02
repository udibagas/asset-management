@extends('layouts.main')

@section('title', $asset->name)

@section('content')

    <div class="card lg:card-side bg-base-100 shadow-sm">
        <figure>
            @if ($asset->image)
                <img src="{{ asset('storage/' . $asset->image) }}" alt="{{ $asset->name }}" />
            @else
                <img src="https://prd.place/400?id={{ $asset->id }}" alt="{{ $asset->name }}" />
            @endif
        </figure>
        <div class="card-body">
            <h2 class="card-title">{{ $asset->name }}</h2>


            <div class="flex flex-col gap-4 mb-4">
                <div class="text-primary text-lg">
                    {{ $asset->valueInRupiah }}
                </div>

                <div class="flex gap-2 flex-wrap">
                    <div class="badge badge-outline badge-info badge-sm">
                        {{ $asset->location->name }}
                    </div>

                    <div class="badge badge-outline badge-info badge-sm">
                        {{ $asset->category->name }}
                    </div>
                </div>
            </div>

            <div class="card-actions justify-start">
                <button class="btn btn-primary">Minat</button>
            </div>
        </div>
    </div>

@endsection

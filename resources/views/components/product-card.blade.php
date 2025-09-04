<div class="dark w-80 shadow-sm">
    <figure>
        <a href="/asset/{{ $asset->id }}">
            @if ($asset->image)
                <img src="{{ asset('storage/' . $asset->image) }}" alt="{{ $asset->name }}" class="min-h-60" />
            @else
                <img src="https://prd.place/200?id={{ $asset->id }}" alt="{{ $asset->name }}" class="min-h-60" />
            @endif
        </a>
    </figure>
    <div class="card-body">
        <h2 class="card-title line-clamp-1">
            <a href="/asset/{{ $asset->id }}">{{ $asset->name }}</a>
        </h2>

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


        <div class="card-actions justify-center">
            <a href="/asset/{{ $asset->id }}" class="btn btn-primary w-full">Minat</a>
        </div>
    </div>
</div>

<div class="container m-auto flex gap-4 p-8">
    <div class="flex-1">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam doloremque totam illum ullam dolor molestiae
        adipisci, dolore iste tenetur blanditiis autem quis cumque repellat reprehenderit animi voluptatum mollitia
        sequi cupiditate.

    </div>

    <div class="flex-1">
        <h1 class="text-lg font-bold mb-3">Lokasi</h1>

        @foreach ($locations as $location)
            <p>{{ $location->name }}</p>
        @endforeach
    </div>

    <div class="flex-1">
        <h1 class="text-lg font-bold mb-3">Kategori</h1>

        @foreach ($categories as $category)
            <p>{{ $category->name }}</p>
        @endforeach
    </div>

    <div class="flex-1">
        <h1 class="text-lg font-bold mb-3">Hubungi Kami</h1>
        <p>Email: info@example.com</p>
        <p>Telepon: (123) 456-7890</p>

    </div>
</div>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Create Asset</title>
</head>

<body>
    @include('_partial._navbar')

    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-bold mb-8">Create Asset</h1>

        <form action="/asset" method="POST" class="space-y-4">
            @csrf
            <div class="flex flex-col space-y-4">
                <label for="name" class="block text-sm font-medium">Name</label>
                <input type="text" id="name" name="name" class="input" required>
            </div>
            <div class="flex flex-col space-y-4">
                <label for="value" class="block text-sm font-medium">Value</label>
                <input type="number" id="value" name="value" class="input" required>
            </div>
            <div class="flex flex-col space-y-4">
                <label for="category" class="block text-sm font-medium">Category</label>
                <select id="category" name="category_id" class="input" required>
                    <option value="">Select Category</option>
                    <?php foreach ($categories as $category): ?>
                    <option value="<?= $category->id ?>"><?= $category->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="flex flex-col space-y-4">
                <label for="location" class="block text-sm font-medium">Location</label>
                <select id="location" name="location_id" class="input" required>
                    <option value="">Select Location</option>
                    <?php foreach ($locations as $location): ?>
                    <option value="<?= $location->id ?>"><?= $location->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create Asset</button>
        </form>
    </div>

</body>

</html>

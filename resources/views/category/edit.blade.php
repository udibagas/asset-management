<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Edit Category</title>
</head>

<body>
    @include('_partial._navbar')

    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-bold mb-8">Edit Category</h1>

        <form action="/category/<?= $category->id ?>" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div class="flex flex-col space-y-4">
                <label for="name" class="block text-sm font-medium">Name</label>
                <input type="text" id="name" name="name" class="input" value="<?= $category->name ?>"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>

</body>

</html>

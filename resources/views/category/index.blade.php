<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Category Management</title>
</head>

<body>

    @include('_partial._navbar')

    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-bold mb-8">Category</h1>

        <form class="flex gap-4 items-center justify-between mb-8">
            <input type="text" class="input" name="search" placeholder="Search categories...">
            <a href="/category/create" class="btn btn-primary">Create New Category</a>
        </form>


        <!-- List categories -->

        <div class="overflow-x-auto mb-8">
            <table class="table table-sm">
                <!-- head -->
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Jumlah Asset</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <?php foreach ($categories as $index => $category) { ?>
                    <tr>
                        <th><?= $index + 1 ?></th>
                        <td><?= $category->name ?></td>
                        <td><?= $category->assets->count() ?></td>
                        <td class="flex gap-2 w-[80px]">
                            <a href="/category/<?= $category->id ?>/edit" class="btn btn-warning btn-sm">Edit</a>

                            <form action="/category/<?= $category->id ?>" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-error btn-sm">Delete</button>
                            </form>

                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        {{ $categories->links() }}
    </div>
</body>

</html>

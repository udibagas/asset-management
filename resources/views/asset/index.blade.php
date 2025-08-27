<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Asset Management</title>
</head>

<body>

    <div class="navbar bg-base-100 shadow-sm">
        <div class="flex-none">
            <a class="btn btn-ghost text-xl">Asset Management Laravel</a>
        </div>
        <div class="flex-1">
            <ul class="menu menu-horizontal px-1">
                <li><a href="/asset">Asset List</a></li>
            </ul>
        </div>
    </div>

    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-bold mb-8">Asset Management</h1>

        <form class="flex gap-4 items-center">
            <input type="text" class="input" name="search" placeholder="Search assets...">
            <a href="/asset/create" class="btn btn-primary mb-4">Create New Asset</a>
        </form>


        <!-- List assets -->

        <div class="overflow-x-auto mb-8">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Value</th>
                        <th>Category</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <?php foreach ($assets as $index => $asset) { ?>
                    <tr>
                        <th><?= $index + 1 ?></th>
                        <td><?= $asset->name ?></td>
                        <td><?= $asset->value ?></td>
                        <td><?= $asset->category ?></td>
                        <td><?= $asset->location ?></td>
                        <td class="flex gap-2">
                            <form action="/asset/<?= $asset->id ?>" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-error">Delete</button>
                            </form>

                            <a href="/asset/<?= $asset->id ?>/edit" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        {{ $assets->links() }}
    </div>
</body>

</html>

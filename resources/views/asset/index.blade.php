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

    @include('_partial._navbar')

    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-bold mb-8">Asset Management</h1>

        <form class="flex gap-4 items-center justify-between mb-8">
            <div class="flex gap-4">
                <input type="text" class="input w-[180px]" name="search" placeholder="Search assets...">
                <select id="category" name="category_id" class="input">
                    <option value="">Select Category</option>
                    <?php foreach ($categories as $category): ?>
                    <option value="<?= $category->id ?>"><?= $category->name ?></option>
                    <?php endforeach; ?>
                </select>

                <select id="location" name="location_id" class="input">
                    <option value="">Select Location</option>
                    <?php foreach ($locations as $location): ?>
                    <option value="<?= $location->id ?>"><?= $location->name ?></option>
                    <?php endforeach; ?>
                </select>
                <button class="btn btn-primary" type="submit">Filter</button>
                <a href="/asset" class="btn btn-primary btn-outline" type="reset">Reset</a>
            </div>

            <a href="/asset/create" class="btn btn-primary">Create New Asset</a>
        </form>


        <!-- List assets -->

        <div class="overflow-x-auto mb-8">
            <table class="table table-sm">
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
                        <td><?= $index + 1 ?></td>
                        <td class="font-bold"><?= $asset->name ?></td>
                        <td class="w-[200px]">
                            <div class="badge badge-soft badge-primary">
                                <?= $asset->valueInRupiah ?>
                            </div>
                        </td>
                        <td>
                            <div class="badge badge-outline badge-info badge-sm">
                                <?= $asset->category->name ?>
                            </div>
                        </td>
                        <td><?= $asset->location->name ?></td>
                        <td class="flex gap-2 w-[80px]">
                            <a href="/asset/<?= $asset->id ?>/edit" class="btn btn-warning btn-sm">Edit</a>

                            <form action="/asset/<?= $asset->id ?>" method="POST">
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
        {{ $assets->links() }}
    </div>
</body>

</html>

<?php
$selectedType = $filters['type'] ?? '';
$selectedCategory = $filters['category'] ?? '';
$keyword = $filters['keyword'] ?? '';
$city = $filters['city'] ?? '';

require_once '../partials/header.php';
?>

<div class="bg-white rounded-lg shadow-sm border border-slate-200 mb-6">
    <div class="p-4">
        <form method="get" action="/" class="grid grid-cols-1 gap-4 md:grid-cols-12">
            <div class="md:col-span-4">
                <label class="block text-sm font-medium text-slate-700 mb-1">Keyword</label>
                <input type="text" name="keyword" class="w-full rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500" value="<?php echo htmlspecialchars($keyword); ?>" placeholder="Search description or location">
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-slate-700 mb-1">Type</label>
                <select name="type" class="w-full rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500">
                    <option value="">All</option>
                    <?php foreach ($types as $type): ?>
                        <option value="<?php echo $type; ?>" <?php echo $type === $selectedType ? 'selected' : ''; ?>>
                            <?php echo ucfirst($type); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="md:col-span-3">
                <label class="block text-sm font-medium text-slate-700 mb-1">Category</label>
                <select name="category" class="w-full rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500">
                    <option value="">All</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category; ?>" <?php echo $category === $selectedCategory ? 'selected' : ''; ?>>
                            <?php echo $category; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="md:col-span-3">
                <label class="block text-sm font-medium text-slate-700 mb-1">City</label>
                <input type="text" name="city" class="w-full rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500" value="<?php echo htmlspecialchars($city); ?>" placeholder="Casablanca">
            </div>
            <div class="md:col-span-12 flex flex-wrap gap-2">
                <button class="inline-flex items-center px-4 py-2 rounded-md bg-slate-900 text-white font-medium hover:bg-slate-800">Search</button>
                <a class="inline-flex items-center px-4 py-2 rounded-md border border-slate-300 text-slate-700 hover:bg-slate-50" href="/">Clear</a>
            </div>
        </form>
    </div>
</div>

<?php if (empty($posts)): ?>
    <div class="rounded-md border border-blue-200 bg-blue-50 text-blue-700 px-4 py-3">No active posts found.</div>
<?php else: ?>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <?php foreach ($posts as $post): ?>
            <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-4">
                <div class="flex justify-between items-start">
                    <div class="flex flex-wrap gap-2">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold <?php echo $post['type'] === 'lost' ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700'; ?>">
                            <?php echo ucfirst($post['type']); ?>
                        </span>
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-700">
                            <?php echo htmlspecialchars($post['category']); ?>
                        </span>
                    </div>
                    <small class="text-slate-500 text-xs"><?php echo htmlspecialchars($post['created_at']); ?></small>
                </div>
                <h3 class="mt-3 text-lg font-semibold"><?php echo htmlspecialchars($post['city']); ?></h3>
                <p class="text-slate-500 text-sm"><?php echo htmlspecialchars($post['location_text']); ?></p>
                <p class="mt-2 text-slate-700"><?php echo htmlspecialchars($post['description']); ?></p>
                <a class="inline-flex items-center mt-4 px-3 py-2 rounded-md border border-blue-600 text-blue-600 font-medium hover:bg-blue-50" href="/posts/<?php echo $post['id']; ?>">View Details</a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

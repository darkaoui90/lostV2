<?php
$old = $old ?? [];

require_once '../partials/header.php';
?>



<div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
    <h2 class="text-xl font-semibold mb-4">Create a Post</h2>

    <?php if (!empty($errors)): ?>
        <div class="rounded-md border border-red-200 bg-red-50 text-red-700 px-4 py-3 mb-4">
            <ul class="list-disc list-inside">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="/posts" class="grid grid-cols-1 gap-4 md:grid-cols-12">
        <div class="md:col-span-6">
            <label class="block text-sm font-medium text-slate-700 mb-1">Type</label>
            <select name="type" class="w-full rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500" required>
                <option value="">Select</option>
                <?php foreach ($types as $type): ?>
                    <option value="<?php echo $type; ?>" <?php echo ($old['type'] ?? '') === $type ? 'selected' : ''; ?>>
                        <?php echo ucfirst($type); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="md:col-span-6">
            <label class="block text-sm font-medium text-slate-700 mb-1">Category</label>
            <select name="category" class="w-full rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500" required>
                <option value="">Select</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category; ?>" <?php echo ($old['category'] ?? '') === $category ? 'selected' : ''; ?>>
                        <?php echo $category; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="md:col-span-6">
            <label class="block text-sm font-medium text-slate-700 mb-1">City</label>
            <input type="text" name="city" class="w-full rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500" required value="<?php echo htmlspecialchars($old['city'] ?? ''); ?>">
        </div>
        <div class="md:col-span-6">
            <label class="block text-sm font-medium text-slate-700 mb-1">Location</label>
            <input type="text" name="location_text" class="w-full rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500" required value="<?php echo htmlspecialchars($old['location_text'] ?? ''); ?>">
        </div>
        <div class="md:col-span-12">
            <label class="block text-sm font-medium text-slate-700 mb-1">Description</label>
            <textarea name="description" class="w-full rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500" maxlength="500" rows="4" required><?php echo htmlspecialchars($old['description'] ?? ''); ?></textarea>
        </div>
        <div class="md:col-span-6">
            <label class="block text-sm font-medium text-slate-700 mb-1">WhatsApp Number</label>
            <input type="text" name="whatsapp" class="w-full rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500" required value="<?php echo htmlspecialchars($old['whatsapp'] ?? ''); ?>" placeholder="e.g. 212612345678">
        </div>
        <div class="md:col-span-6">
            <label class="block text-sm font-medium text-slate-700 mb-1">Phone (optional)</label>
            <input type="text" name="phone" class="w-full rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500" value="<?php echo htmlspecialchars($old['phone'] ?? ''); ?>">
        </div>
        <div class="md:col-span-12 flex flex-wrap gap-2">
            <button class="inline-flex items-center px-4 py-2 rounded-md bg-blue-600 text-white font-medium hover:bg-blue-700">Publish</button>
            <a class="inline-flex items-center px-4 py-2 rounded-md border border-slate-300 text-slate-700 hover:bg-slate-50" href="/">Cancel</a>
        </div>
    </form>
</div>

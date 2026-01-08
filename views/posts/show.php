<?php
$whatsapp = preg_replace('/\D+/', '', $post['whatsapp']);
$phone = $post['phone'] ? preg_replace('/\D+/', '', $post['phone']) : '';

require_once '../partials/header.php';
?>

<div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
    <div class="flex justify-between items-start">
        <div class="flex flex-wrap gap-2">
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold <?php echo $post['type'] === 'lost' ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700'; ?>">
                <?php echo ucfirst($post['type']); ?>
            </span>
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-700">
                <?php echo htmlspecialchars($post['category']); ?>
            </span>
            <?php if ($post['status'] === 'resolved'): ?>
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">Resolved</span>
            <?php endif; ?>
        </div>
        <small class="text-slate-500 text-xs"><?php echo htmlspecialchars($post['created_at']); ?></small>
    </div>

    <h3 class="mt-4 text-2xl font-semibold"><?php echo htmlspecialchars($post['city']); ?></h3>
    <p class="text-slate-500"><?php echo htmlspecialchars($post['location_text']); ?></p>
    <p class="mt-3 text-slate-700"><?php echo htmlspecialchars($post['description']); ?></p>

    <div class="flex flex-wrap gap-2 mt-6">
        <a class="inline-flex items-center px-4 py-2 rounded-md bg-green-600 text-white font-medium hover:bg-green-700" href="https://wa.me/<?php echo htmlspecialchars($whatsapp); ?>" target="_blank" rel="noopener">Contact on WhatsApp</a>
        <?php if ($phone !== ''): ?>
            <a class="inline-flex items-center px-4 py-2 rounded-md border border-blue-600 text-blue-600 font-medium hover:bg-blue-50" href="tel:<?php echo htmlspecialchars($phone); ?>">Call</a>
        <?php endif; ?>
    </div>

    <?php if ($post['status'] === 'active'): ?>
        <form method="post" action="/posts/<?php echo $post['id']; ?>/resolve" class="mt-6">
            <button class="inline-flex items-center px-4 py-2 rounded-md bg-red-600 text-white font-medium hover:bg-red-700">Mark as Resolved</button>
        </form>
    <?php endif; ?>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lost & Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-900">
<?php $content = $content ?? ''; ?>
<nav class="bg-white border-b">
    <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
        <a class="text-xl font-semibold" href="/">Lost & Found</a>
        <a class="inline-flex items-center px-4 py-2 rounded-md bg-blue-600 text-white font-medium hover:bg-blue-700" href="/posts/create">Create Post</a>
    </div>
</nav>

<main class="max-w-6xl mx-auto px-4 py-6">
    <?php echo $content; ?>
</main>
</body>
</html>

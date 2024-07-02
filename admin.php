<?php
include 'connect.php';

$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();
$users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">User Management</h1>

    <!-- Form for adding a new user -->
    <form action="create.php" method="POST" class="mb-4">
        <div class="flex items-center mb-2">
            <input name="nama" type="text" class="flex-grow border rounded p-2 mr-2" placeholder="Name" required>
        </div>
        <div class="flex items-center mb-2">
            <input name="email" type="email" class="flex-grow border rounded p-2 mr-2" placeholder="Email" required>
        </div>
        <div class="flex items-center mb-2">
            <input name="password" type="password" class="flex-grow border rounded p-2 mr-2" placeholder="Password" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add User</button>
    </form>

    <!-- User list -->
    <ul class="space-y-2">
        <?php foreach ($users as $user): ?>
            <li class="flex justify-between items-center bg-white p-4 rounded shadow">
                <div>
                    <p>Name: <?= htmlspecialchars($user['nama']) ?></p>
                    <p>Email: <?= htmlspecialchars($user['email']) ?></p>
                </div>
                <div>
                    <a href="update.php?id=<?= $user['id'] ?>" class="text-blue-500 mr-2">Edit</a>
                    <a href="delete.php?id=<?= $user['id'] ?>" class="text-red-500">Delete</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>

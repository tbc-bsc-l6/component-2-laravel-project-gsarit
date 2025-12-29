<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CDN for quick styling -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between">
            <h1 class="text-xl font-bold">Admin Dashboard</h1>
            <ul class="flex space-x-4">
                <li><a href="#" class="hover:underline">Teachers</a></li>
                <li><a href="#" class="hover:underline">Modules</a></li>
                <li><a href="#" class="hover:underline">Users</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-6">Quick Actions</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white shadow rounded p-4">
                <h3 class="text-lg font-bold mb-2">Add Teacher</h3>
                <form method="POST" action="#">
                    <input type="text" name="name" placeholder="Name" class="border p-2 w-full mb-2">
                    <input type="email" name="email" placeholder="Email" class="border p-2 w-full mb-2">
                    <input type="password" name="password" placeholder="Password" class="border p-2 w-full mb-2">
                    <button class="bg-blue-600 text-white px-4 py-2 rounded">Create Teacher</button>
                </form>
            </div>

            <div class="bg-white shadow rounded p-4">
                <h3 class="text-lg font-bold mb-2">Create Module</h3>
                <form method="POST" action="#">
                    <input type="text" name="code" placeholder="Code" class="border p-2 w-full mb-2">
                    <input type="text" name="name" placeholder="Name" class="border p-2 w-full mb-2">
                    <textarea name="description" placeholder="Description" class="border p-2 w-full mb-2"></textarea>
                    <button class="bg-green-600 text-white px-4 py-2 rounded">Add Module</button>
                </form>
            </div>
        </div>

        <div class="mt-8 bg-white shadow rounded p-4">
            <h3 class="text-lg font-bold mb-2">Change User Role</h3>
            <form method="POST" action="#">
                <select name="user_id" class="border p-2 w-full mb-2">
                    <option value="1">John Doe (student)</option>
                    <option value="2">Jane Smith (teacher)</option>
                </select>
                <select name="role" class="border p-2 w-full mb-2">
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                    <option value="admin">Admin</option>
                </select>
                <button class="bg-purple-600 text-white px-4 py-2 rounded">Update Role</button>
            </form>
        </div>
    </div>

</body>
</html>

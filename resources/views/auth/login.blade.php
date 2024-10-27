<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>
        @yield('title')
    </title>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto h-screen flex justify-center items-center px-4">
        <div class="bg-white shadow-md rounded-lg max-w-sm w-full p-6">
            <h1 class="text-3xl font-bold mb-4 text-center">Please Login</h1>
            <form>
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Username:</label>
                    <input type="text" id="name" name="name" placeholder="Enter your username"
                        class="shadow valid:border-green-500 peer invalid:border-pink-600 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <p class="mt-2 invisible peer-invalid:visible text-pink-600 text-sm">
                            Please provide a valid email address.
                        </p>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 mt-2 rounded hover:bg-blue-600 w-full">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>
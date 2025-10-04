<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-light d-flex align-items-center justify-content-center vh-100">

    <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
        <h4 class="text-center mb-4">User Login</h4>
        {{-- error message --}}
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            <!-- Username -->
            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username"
                    required>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password"
                    required>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-primary w-100 mb-2 fw-bold">Login <span><i
                        class="fa-solid fa-right-to-bracket"></i></span></button>
        </form>

        <!-- Text link -->
        <div class="text-center mt-2 d-flex justify-content-between align-items-center">
            <a href="/">Go back to Register</a>
            <a class="btn btn-sm btn-outline-secondary fw-bold" href="/admin/login">
                Login as Admin
                <span><i class="fa-solid fa-arrow-right-to-bracket"></i></span>
            </a>

        </div>
    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container my-5">
        <div class="card shadow-sm border-0">
            {{-- show success message --}}
            @if (session('success'))
                <div class="alert alert-success m-3">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">📋 User List</h5>

                <!-- ✅ Logout button -->
                <form action="{{ route('admin.logout') }}" method="POST" class="mb-0">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-light text-danger fw-bold">
                        Logout
                    </button>
                </form>
            </div>

            <div class="card-body p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->full_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form action="{{ route('users.update.status', $user->id) }}" method="POST"
                                        class="d-flex align-items-center">
                                        @csrf
                                        @method('PUT')

                                        <select name="status" class="form-select form-select-sm me-2"
                                            onchange="this.form.submit()">
                                            <option value="pending" {{ $user->status == 'pending' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="approved"
                                                {{ $user->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                            <option value="rejected"
                                                {{ $user->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                        </select>
                                    </form>
                                </td>

                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- ✅ Pagination Links -->
            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    {{ $users->links('pagination::bootstrap-5') }}
                </div>
            </div>

            <div class="card-footer text-center small text-muted">
                © {{ date('Y') }} Admin Panel
            </div>
        </div>
    </div>
</body>

</html>

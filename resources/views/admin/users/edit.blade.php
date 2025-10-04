<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container my-5">
        <div class="card shadow border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">✏️ Edit User - {{ $user->full_name }}</h5>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- ✅ Status field on top -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">User Status</label>
                        <select name="status" class="form-select">
                            <option value="pending" {{ $user->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ $user->status == 'approved' ? 'selected' : '' }}>Approved
                            </option>
                            <option value="rejected" {{ $user->status == 'rejected' ? 'selected' : '' }}>Rejected
                            </option>
                        </select>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">পত্রিকার নাম</label>
                            <input type="text" name="newspaper_name" value="{{ $user->newspaper_name }}"
                                class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">রেফারেন্স কোড</label>
                            <input type="text" name="reference_code" value="{{ $user->reference_code }}"
                                class="form-control">
                        </div>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">পূর্ণ নাম</label>
                        <input type="text" name="full_name" value="{{ $user->full_name }}" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">ইমেইল</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">মোবাইল</label>
                        <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">ইউজারনেম</label>
                        <input type="text" name="username" value="{{ $user->username }}" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">অভিজ্ঞতা (বছর)</label>
                        <input type="number" name="experience_years" value="{{ $user->experience_years }}"
                            class="form-control">
                    </div>



                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back</a>
                        <button class="btn btn-success px-4" type="submit">Update</button>
                    </div>
                </form>
            </div>
           
        </div>
    </div>
</body>

</html>

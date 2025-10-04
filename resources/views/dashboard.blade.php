<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ড্যাশবোর্ড</title>
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-light">

    <div class="container py-5">

        {{-- success message --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- ✅ আবেদন ফর্মের স্ট্যাটাস --}}
        @if ($user->status == 'pending')
            <div class="alert alert-warning text-center fw-bold">
                📝 আপনার আবেদন ফর্মটি <span class="text-dark">পর্যালোচনাধীন (Pending)</span> আছে।
            </div>
        @elseif ($user->status == 'approved')
            <div class="alert alert-success text-center fw-bold">
                ✅ অভিনন্দন! আপনার আবেদন ফর্মটি <span class="text-dark">অনুমোদিত (Approved)</span> হয়েছে।
            </div>
        @elseif ($user->status == 'rejected')
            <div class="alert alert-danger text-center fw-bold">
                ❌ দুঃখিত! আপনার আবেদন ফর্মটি <span class="text-dark">বাতিল (Rejected)</span> হয়েছে।
            </div>
        @endif

        <div class="card shadow-lg border-0 text-center" style="max-width: 600px; margin: auto;">
            <!-- Card Header -->
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">🪪 প্রোফাইল তথ্য</h5>
                <form action="{{ route('user.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-light text-danger fw-bold">Logout</button>
                </form>
            </div>

            <!-- User Photo -->
            <div class="card-body">
                {{-- image --}}
                <img src="{{ asset('storage/' . $user->photo) }}" alt="User Photo"
                    class="rounded-circle border border-3 mb-3" style="width: 120px; height: 120px; object-fit: cover;">

                <h4 class="fw-bold">{{ $user->full_name }}</h4>
                <p class="text-muted mb-3">{{ $user->applied_position }} - {{ $user->working_place }}</p>

                <div class="row text-start">
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>পত্রিকার নাম:</strong> {{ $user->newspaper_name }}</li>
                            <li class="list-group-item"><strong>ইমেইল:</strong> {{ $user->email }}</li>
                            <li class="list-group-item"><strong>মোবাইল:</strong> {{ $user->phone }}</li>
                            <li class="list-group-item"><strong>ঠিকানা:</strong> {{ $user->current_address }}</li>
                            <li class="list-group-item"><strong>ইউজারনেম:</strong> {{ $user->username }}</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>শিক্ষা:</strong> {{ $user->education }}</li>
                            <li class="list-group-item"><strong>অভিজ্ঞতা:</strong> {{ $user->experience_years }} বছর
                            </li>
                            <li class="list-group-item">
                                <strong>পোর্টফোলিও:</strong>
                                <a href="{{ $user->portfolio_link }}" target="_blank">দেখুন</a>
                            </li>
                            <li class="list-group-item"><strong>কভার লেটার:</strong> {{ $user->cover_letter }}</li>
                            <li class="list-group-item">
                                <strong>সিভি:</strong>
                                <a href="{{ asset('storage/' . $user->cv) }}" target="_blank"
                                    class="btn btn-sm btn-outline-primary">ডাউনলোড</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>

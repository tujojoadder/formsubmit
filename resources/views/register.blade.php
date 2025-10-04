<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .is-valid {
            border-color: #198754 !important;
            padding-right: 2.5rem;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23198754' viewBox='0 0 16 16'%3e%3cpath d='M13.485 1.929a.75.75 0 010 1.06l-7.071 7.07-3.536-3.535a.75.75 0 111.06-1.06L6.06 8.475l6.475-6.546a.75.75 0 011.06 0z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }

        .is-invalid {
            border-color: #dc3545 !important;
            padding-right: 2.5rem;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23dc3545' viewBox='0 0 16 16'%3e%3cpath d='M4.646 4.646a.5.5 0 01.708 0L8 7.293l2.646-2.647a.5.5 0 11.708.708L8.707 8l2.647 2.646a.5.5 0 01-.708.708L8 8.707l-2.646 2.647a.5.5 0 01-.708-.708L7.293 8 4.646 5.354a.5.5 0 010-.708z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }
    </style>
</head>

<body class="bg-light ">

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
                {{-- login button --}}
                <div class="login-button mt-3 ">
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary">
                        <i class="fa-solid fa-right-to-bracket"></i> লগইন
                    </a>
                </div>

                <div class="card shadow  my-4">
                    {{-- header --}}
                    <div class="card-header bg-primary text-white">
                        <h5 class=" m-0"><i class="fa-solid fa-calendar"></i> সাংবাদিক নিয়োগ - আবেদন ফর্ম</h5>
                    </div>

                    {{-- body --}}
                    <div class="card-body px-3 py-3">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            {{-- success message --}}
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            {{-- error message --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            @endif
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6 ">
                                    <label class="form-label fw-semibold"> পত্রিকার নাম<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control my-1" name="newspaper_name"
                                        placeholder="যেমন: দৈনিক উদাহরণ">
                                </div>
                                <div class="col-md-6 ">
                                    <label class="form-label fw-semibold"> রেফারেন্স কোড</label>
                                    <input type="text" class="form-control my-1" name="reference_code"
                                        placeholder="ঐচ্ছিক">
                                </div>
                            </div>
                            <hr class="my-3">
                            <h4>ব্যক্তিগত তথ্য</h4>
                            <div class="row g-3 mt-2">
                                <div class="col-md-6 ">
                                    <label class="form-label fw-semibold"> পূর্ণ নাম<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control my-1" name="full_name"
                                        placeholder="আপনার পূর্ণ নাম">
                                </div>
                                <div class="col-md-6 ">
                                    <label class="form-label fw-semibold"> ইমেইল<span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control my-1" name="email"
                                        placeholder="name@example.com">
                                </div>
                            </div>
                            <div class="row g-3 mt-1">
                                <div class="col-md-6 ">
                                    <label class="form-label fw-semibold">মোবাইল<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group phone-input flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i
                                                class="fa-solid fa-phone"></i></span>
                                        <input type="text" name="phone" class="form-control"
                                            placeholder="01XXXXXXXXX" aria-describedby="addon-wrapping">
                                    </div>



                                </div>
                                <div class="col-md-6 ">
                                    <label class="form-label fw-semibold"> বর্তমান ঠিকানা</label>
                                    <input type="text" class="form-control my-1" name="current_address"
                                        placeholder="জেলা/থালা/এরিয়া">
                                </div>
                            </div>
                            <div class="row g-3 mt-2">
                                <div class="col-md-6 ">
                                    <label class="form-label fw-semibold"> ইউজার নেম<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control my-1" name="username"
                                        placeholder="আপনার ইউজার নেম">
                                </div>
                                <div class="col-md-6 ">
                                    <label class="form-label fw-semibold"> পাসওয়ার্ড<span
                                            class="text-danger">*</span></label>
                                    <input type="password" class="form-control my-1" name="password"
                                        placeholder="পাসওয়ার্ড">
                                </div>
                            </div>
                            <hr class="my-3">
                            <h4>পদের তথ্য</h4>
                            <div class="row g-3 mt-2">
                                <div class="col-md-6 ">
                                    <label class="form-label fw-semibold"> আবেদনকৃত পদ<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select my-1" name="applied_position">
                                        <option value="" selected disabled>নির্বাচন করুন...</option>
                                        <option value="সংবাদদাতা">সংবাদদাতা</option>
                                        <option value="সাব এডিটর">সাব এডিটর</option>
                                        <option value="সম্পাদক">সম্পাদক</option>
                                        <option value="ফটোসাংবাদিক">ফটোসাংবাদিক</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">পদস্থানের কর্মস্থল <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select my-1" name="working_place">
                                        <option value="" selected disabled>নির্বাচন করুন...</option>
                                        <option value="ঢাকা">ঢাকা</option>
                                        <option value="চট্টগ্রাম">চট্টগ্রাম</option>
                                        <option value="রাজশাহী">রাজশাহী</option>
                                        <option value="খুলনা">খুলনা</option>

                                    </select>
                                </div>
                            </div>


                            <div class="row g-3 mt-2">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">শিক্ষাগত যোগ্যতা <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select my-1" name="education">
                                        <option value="" selected disabled>নির্বাচন করুন...</option>
                                        <option value="এসএসসি / সমমান">এসএসসি / সমমান</option>
                                        <option value="এইচএসসি / সমমান">এইচএসসি / সমমান</option>
                                        <option value="ডিপ্লোমা">ডিপ্লোমা</option>
                                        <option value="অন্যান্য">অন্যান্য</option>
                                    </select>
                                </div>

                                <div class="col-md-6 ">
                                    <label class="form-label fw-semibold"> অভিজ্ঞতা (বছর)</label>
                                    <input type="number" class="form-control my-1" name="experience_years"
                                        placeholder="যেমন:২">
                                </div>
                            </div>

                            <div class="mb-3 mt-3">
                                <label class="form-label fw-semibold"> পোর্টফোলিও লিংক</label>
                                <input type="url" class="form-control my-1" name="portfolio_link"
                                    placeholder="https://your-portfolio.com">
                            </div>
                            <div class="mb-3 mt-3">
                                <label class="form-label fw-semibold"> কভার লেটার / বিশেষ মন্তব্য</label>

                                <textarea class="form-control" name="cover_letter" rows="3"
                                    placeholder="সংক্ষেপে আপনার সাংবাদিক পোর্টফোলিও ও কেন এই পদে যোগ দিতে চান তা লিখুন"></textarea>
                            </div>



                            <!-- আপলোড -->
                            <h5 class="mb-3">ডকুমেন্ট আপলোড</h5>
                            <hr>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label  ">সিভি (PDF/DOC)</label>
                                    <input class="form-control" type="file" name="cv"
                                        accept=".pdf,.doc,.docx"="">
                                    <div class="form-text">সর্বোচ্চ 5MB</div>
                                    <div class="invalid-feedback">সিভি আপলোড করুন।</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">সদ্য তোলা ছবি (JPG/PNG)</label>
                                    <input class="form-control" type="file" name="photo"
                                        accept=".jpg,.jpeg,.png">
                                    <div class="form-text">সর্বোচ্চ 2MB</div>
                                </div>
                            </div>

                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="1" id="agree"="">
                                <label class="form-check-label  " for="agree">
                                    প্রদত্ত সকল তথ্য সঠিক – আমি সম্মত।
                                </label>
                                <div class="invalid-feedback">সম্মতি দিন।</div>
                            </div>

                            <div class="d-grid d-sm-flex gap-2 mt-4">
                                <button class="btn btn-primary px-4" type="submit">
                                    <i class="bi bi-send me-1"></i> আবেদন সাবমিট করুন
                                </button>
                                <button class="btn btn-outline-secondary" type="reset">
                                    <i class="bi bi-arrow-counterclockwise me-1"></i> রিসেট
                                </button>
                            </div>


                        </form>
                    </div>
                    <div class="card-footer text-muted small">
                        © <span id="year">2025</span> [swadhinshomoy] •
                    </div>
                </div>
            </div>
        </div>
    </div>




    {{-- js --}}
    <script>
        $(document).ready(function() {

            // form submit হলে
            $("form").on("submit", function(e) {
                let isValid = true;
                $(".error-text").remove(); // আগের error মুছে ফেলবো
                /* Add valid class for all no required field */

                $("input[name='current_address']").addClass("is-valid");
                $("input[name='reference_code']").addClass("is-valid");
                $("input[name='portfolio_link']").addClass("is-valid");
                $("textarea[name='cover_letter']").addClass("is-valid");
                $("input[name='photo']").addClass("is-valid");
                $("input[name='experience_years']").addClass("is-valid");

                // Newspaper Name চেক
                let newspaper = $("input[name='newspaper_name']");
                if (newspaper.val().trim() === "") {
                    isValid = false;
                    newspaper.addClass("is-invalid").removeClass("is-valid");
                    newspaper.after("<small class='text-danger error-text'>পত্রিকার নাম দিন</small>");
                } else {
                    newspaper.removeClass("is-invalid").addClass("is-valid");
                }

                // Name চেক
                let name = $("input[name='full_name']");
                if (name.val().trim() === "") {
                    isValid = false;
                    name.addClass("is-invalid").removeClass("is-valid");
                    name.after("<small class='text-danger error-text'>পূর্ণ নাম দিন।</small>");
                } else {
                    name.removeClass("is-invalid").addClass("is-valid");
                }

                // Email চেক
                let email = $("input[name='email']");
                let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (email.val().trim() === "" || !emailPattern.test(email.val().trim())) {
                    isValid = false;
                    email.addClass("is-invalid").removeClass("is-valid");
                    email.after("<small class='text-danger error-text'>সঠিক ইমেইল লিখুন</small>");
                } else {
                    email.removeClass("is-invalid").addClass("is-valid");
                }

                // মোবাইল চেক
                let phone = $("input[name='phone']");
                let phonePattern = /^01[0-9]{9}$/; // 11 digit BD number
                if (!phonePattern.test(phone.val().trim())) {
                    isValid = false;
                    phone.addClass("is-invalid").removeClass("is-valid");
                    $(".phone-input").after(
                        "<small class='text-danger error-text'>সঠিক মোবাইল নাম্বার দিন (11 ডিজিট)</small>"
                    );
                } else {
                    phone.removeClass("is-invalid").addClass("is-valid");
                }

                // Username চেক
                let username = $("input[name='username']");
                if (username.val().trim() === "") {
                    isValid = false;
                    username.addClass("is-invalid").removeClass("is-valid");
                    username.after("<small class='text-danger error-text'>ইউজারনেম দিন</small>");
                } else {
                    username.removeClass("is-invalid").addClass("is-valid");
                }

                // Password চেক
                let password = $("input[name='password']");
                if (password.val().trim().length < 6) {
                    isValid = false;
                    password.addClass("is-invalid").removeClass("is-valid");
                    password.after(
                        "<small class='text-danger error-text'>পাসওয়ার্ড কমপক্ষে 6 অক্ষরের হতে হবে</small>"
                    );
                } else {
                    password.removeClass("is-invalid").addClass("is-valid");
                }



                /* drop dawon */
                // Applied Position চেক
                let appliedPosition = $("select[name='applied_position']").val();
                if (!appliedPosition) {
                    isValid = false;
                    $("select[name='applied_position']")
                        .addClass("is-invalid")
                        .after("<small class='text-danger error-text'>আবেদনকৃত পদ নির্বাচন করুন</small>");
                } else {
                    $("select[name='applied_position']").removeClass("is-invalid").addClass("is-valid");
                }

                // Working Place চেক
                let workingPlace = $("select[name='working_place']").val();
                if (!workingPlace) {
                    isValid = false;
                    $("select[name='working_place']")
                        .addClass("is-invalid")
                        .after("<small class='text-danger error-text'>কর্মস্থল নির্বাচন করুন</small>");
                } else {
                    $("select[name='working_place']").removeClass("is-invalid").addClass("is-valid");
                }

                // Education চেক
                let education = $("select[name='education']").val();
                if (!education) {
                    isValid = false;
                    $("select[name='education']")
                        .addClass("is-invalid")
                        .after(
                            "<small class='text-danger error-text'>শিক্ষাগত যোগ্যতা নির্বাচন করুন</small>");
                } else {
                    $("select[name='education']").removeClass("is-invalid").addClass("is-valid");
                }









                // CV upload চেক
                let cv = $("input[name='cv']").val();
                if (cv === "") {
                    isValid = false;
                    $("input[name='cv']").after(
                        "<small class='text-danger error-text'>সিভি আপলোড করুন</small>");
                }

                // Photo optional, তবে দিলে ফরম্যাট চেক করবো
                let photo = $("input[name='photo']").val();
                if (photo !== "" && !(/\.(jpg|jpeg|png)$/i).test(photo)) {
                    isValid = false;
                    $("input[name='photo']").after(
                        "<small class='text-danger error-text'>শুধু JPG/PNG ছবি আপলোড করুন</small>");
                }

                // Checkbox চেক
                if (!$("#agree").is(":checked")) {
                    isValid = false;
                    $("#agree").after("<small class='text-danger error-text d-block'>সম্মতি দিন</small>");
                }

                // যদি কোন error থাকে, তাহলে submit বন্ধ হবে
                if (!isValid) {
                    e.preventDefault();
                }
            });

        });



        // Error Remove 
        $("input, textarea, select").on("input change", function() {
            $(this).next(".error-text").remove();
        });
        /* only for phone */
        $("input[name='phone']").on("input change", function() {
            $('.phone-input').next(".error-text").remove();
        });

        /* drop dawon */

        $("input, textarea, select").on("input change", function() {
            $(this).removeClass("is-invalid").addClass("is-valid");
            $(this).next(".error-text").remove();
        });
    </script>
</body>

</html>

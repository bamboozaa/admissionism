@extends('layouts.app')
@section('title', 'INTERNATIONAL SCHOOL OF MANAGEMENT ENQUIRY FORM')

@section('importcss')
    @parent
    {{-- {{ Html::style('css/custom.css') }} --}}
    {{-- {{ Html::style('css/intlTelInput.css') }} --}}
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/intlTelInput.css">
@stop

@section('importjs')
    @parent
    <script type="module">
        @if (session('success'))
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success'
            });
        @endif

        // $(document).ready(function() {
        //     $('#phone').mask('000 000 0000');
        // });

    </script>
@stop

@section('content')

    <header class="banner">
        <img src="../img/banner_home.png" alt="" class="d-none d-lg-block w-100">
    </header>

    <div class="container-fluid" id="detail-container">
        <div class="row">
            <div class="col-12 pt-4">
                <h1 class="text-center" style="color: #00008b;">{{ __('ENQUIRY FORM') }}</h1>
            </div>
            <div class="container" id="form-container">
                <div class="col-12 col-md-12">
                    <form method="post" action="{{ route('enquiries.store') }}">
                        @csrf
                        <div class="text-left py-3">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="col-md-6">
                                    <label for="nationality">Nationality <span class="text-danger">*</span></label>
                                    <input type="text" id="nationality" name="nationality" class="form-control @error('nationality') is-invalid @enderror">

                                    @error('nationality')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="program_interested">PROGRAM INTERESTED <span class="text-danger">*</span></label>
                                    <select id="program_interested" name="program_interested" class="form-select @error('program_interested') is-invalid @enderror">
                                        <option value="" selected disabled hidden>Choose here</option>
                                        <option value="BBA - International Business Management">BBA - International Business Management</option>
                                        <!-- <option value="BBA – Hospitality Business Management">BBA – Hospitality Business Management</option> -->
                                        <option value="BACC – Bachelor of Accountancy">BACC – Bachelor of Accountancy</option>
                                        <!-- <option value="BBA/BB (Australia – Two Degree Program)">BBA/BB (Australia – Two Degree Program)</option> -->
                                        <!-- Added by Komsan 24/05/2021 -->
                                        <option value="BA - Business English Option in the major">BA - Business English Option in the major</option>
                                        <!-- Backup by Komsan 24/05/2021
                                        <option value="BACC/BCOM (Australia – Two Degree Program)">BACC/BCOM (Australia – Two Degree Program)</option>-->
                                        <option value="GLOBAL MBA">GLOBAL MBA</option>
                                        <!--<option value="GLOBAL MBA/MIME (Australia – Two Degree Program)">GLOBAL MBA/MIME (Australia – Two Degree Program)</option>
                                        <option value="GLOBAL MBA/MPA (Australia – Two Degree Program)">GLOBAL MBA/MPA (Australia – Two Degree Program)</option>-->
                                        <!-- Add 17/03/2021 by Komsan -->
                                        <option value="BBA (MCU Program)">BBA (MCU Program)</option>
                                        <option value="XMBA">XMBA</option>
                                        <option value="Doctor of Management">Doctor of Management</option>
                                        <!-- End Add 17/03/2021 by Komsan -->
                                    </select>

                                    @error('program_interested')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="col-md-6">
                                    <label for="entry_semester">ENTRY SEMESTER <span class="text-danger">*</span></label>
                                    <select id="entry_semester" name="entry_semester" class="form-select @error('entry_semester') is-invalid @enderror">
                                        <option value="" selected disabled hidden>Choose here</option>
                                        <!--<option value="AUG 2020">AUG 2020</option>-->
                                        <!-- <option value="JAN 2021">JAN 2021</option>
                                        <option value="AUG 2021">AUG 2021</option>
                                        <option value="JAN 2022">JAN 2022</option>
                                        <option value="AUG 2022">AUG 2022</option> -->
                                        <!-- Add 17/03/2021 by Komsan -->
                                        <option value="JAN 2023">JAN 2023</option>
                                        <option value="AUG 2023">AUG 2023</option>
                                        <option value="JAN 2024">JAN 2024</option>
                                        <option value="AUG 2024">AUG 2024</option>
                                    </select>

                                    @error('entry_semester')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="current_education">CURRENT EDUCATION STATUS <span class="text-danger">*</span></label>
                                    <input type="text" name="current_education" value="" class="form-control @error('current_education') is-invalid @enderror" list="current_education">
                                    <datalist id="current_education">
                                        <option>Grade 12</option>
                                        <option>M.6</option>
                                        <option>GED</option>
                                        <option>IB Certificate</option>
                                        <option>A LEVEL</option>
                                        <option>Bachelor’s degree</option>
                                        <option>Master’s degree</option>
                                    </datalist>

                                    @error('current_education')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="col-md-6">
                                    <label for="school_name">SCHOOL/UNIVERSITY NAME <span class="text-danger">*</span></label>
                                    <input type="text" id="school_name" name="school_name" class="form-control @error('school_name') is-invalid @enderror">

                                    @error('school_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="email">EMAIL <span class="text-danger">*</span></label>
                                    <input type="text" id="email" name="email" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="col-md-6">
                                    <label for="phone">MOBILE </label><br />
                                    <input type="tel" id="phone" name="phone" placeholder="Mobile Number" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="direct_message">DIRECT MESSAGE <span class="text-danger">*</span></label>
                                    <input type="text" id="direct_message" name="direct_message" class="form-control @error('direct_message') is-invalid @enderror" />

                                    @error('direct_message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="col-md-6">
                                    <label for="where_did_you_hear">WHERE DID YOU HEAR ABOUT UTCC-ISM? <span class="text-danger">*</span></label><br />
                                    <input type="text" id="where_did_you_hear" name="where_did_you_hear" class="form-control @error('direct_message') is-invalid @enderror">

                                    @error('where_did_you_hear')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="text-left">
                                <div class="row">
                                    <div class="col-12">
                                        <button id="btn-custom-revise" type="submit" name="submit" value="submit"
                                            class="btn btn-block btn-lg"> Enquire Now </button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container py-3">
            <div class="row mx-3">
                <div class="col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <p style="color: #db1827;">CONTACT US</p>
                            <p>Tel: +66 2697-6142<br class="d-none d-lg-block"> Website: <a href="https://ism.utcc.ac.th/"
                                    target="_blank"><span style="color:#003366;">https://ism.utcc.ac.th/</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mx-3">
                <div style="position: relative;">
                    <div class="col-md-12">
                        <a href="https://ism.utcc.ac.th" target="_blank"><img src="../img/social_8.png"></a>
                        <a href="mailto:ism@utcc.ac.th"><img src="../img/social_7.png"></a>
                        <a href="https://www.facebook.com/ISMUTCC/" target="_blank"><img src="../img/social_1.png"></a>
                        <a href="http://line.me/ti/p/@utcc_inter" target="_blank"><img src="../img/social_3.png"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="justify-content-between footer p-2 text-center" style="background-color: #02247d; color: #fff">
        <div class="col-12"> Copyright @ 2020 </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script> --}}
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    <script src="../js/intlTelInput.js"></script>
    <script>
        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
            // allowDropdown: false,
            // autoHideDialCode: false,
            // autoPlaceholder: "off",
            // dropdownContainer: document.body,
            // excludeCountries: ["us"],
            // formatOnDisplay: false,
            // geoIpLookup: function(callback) {
            //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
            //     var countryCode = (resp && resp.country) ? resp.country : "";
            //     callback(countryCode);
            //   });
            // },
            hiddenInput: "full_number",
            initialCountry: "th",
            // localizedCountries: { 'de': 'Deutschland' },
            // nationalMode: false,
            // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
            // placeholderNumberType: "MOBILE",
            // preferredCountries: ['cn', 'jp'],
            // separateDialCode: true,
            utilsScript: "../js/utils.js",
        });
    </script>

    <!-- Custom JS -->
    {{-- <script src="../js/custom.js"></script> --}}

@endsection

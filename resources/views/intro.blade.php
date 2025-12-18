@extends('layouts.login_master')


@section('content')
    <style>
        .body {
            background: #FFF;
            min-height: 100vh;
        }
        .page-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo {
            max-height: 80px;
            margin-bottom: 15px;
        }

        .app-description {
            max-width: 700px;
            margin: 0 auto 40px;
            color: #555;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .btn-blue {
            background-color: #0d6efd;
            color: #fff;
        }

        .btn-blue:hover {
            background-color: #0b5ed7;
            color: #fff;
        }

        .card-title {
            font-weight: 600;
        }
    </style>
    <div class="body">
        <div class="page-wrapper">
            <div class="container">

                <!-- Logo & App Description -->
                <div class="text-center mb-4 animate__animated animate__fadeInDown">
                    <!-- Replace src with your logo path -->
                    <img src="{{ \App\Repositories\SettingRepo::getlogo() }}" alt="School Logo" class="logo">

                    <h3 class="text-primary font-weight-bold">
                        {{ \App\Helpers\Qs::getSystemName() }}
                    </h3>

                    <p class="app-description">
                        This platform allows students to securely check their academic results
                        online using their admission number and result checker PIN.
                        Administrators can log in to manage student records and results.
                    </p>
                </div>

                <!-- Cards -->
                <div class="row justify-content-center">

                    <!-- Admin Card -->
                    <div class="col-md-5 mb-4 animate__animated animate__fadeInLeft">
                        <div class="card h-100 text-center p-4">
                            <div class="card-body d-flex flex-column justify-content-center">
                                <h4 class="card-title mb-3 text-primary">Admin Portal</h4>
                                <p class="mb-4">
                                    Secure login for administrators to manage results and admissions.
                                </p>
                                <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                                    Admin Login
                                </a>
                                <br/>
                                <a href="{{ route('login') }}" class="btn btn-success btn-lg">
                                    Student Login
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Student Card -->
                    <div class="col-md-7 mb-4 animate__animated animate__fadeInRight">
                        <div class="card p-4">
                            <div class="card-body">
                                <h4 class="card-title mb-4 text-primary">Check Student Result</h4>
                                @if (session()->has("error"))
                                    <div class="alert alert-danger alert-styled-left alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                        <span class="font-weight-semibold">Oops!</span> {{ session()->get("error") }}
                                    </div>
                                @endif
                                <form  action="{{ route('check-result') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Admission Number</label>
                                        <input type="text" value="{{ old('admission_number') }}" class="form-control" name="admission_number" placeholder="Enter Admission Number" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Result Checker PIN</label>
                                        <input type="text" value="{{ old('pin') }}" name="pin" autocomplete="off" style="text-transform:uppercase" placeholder="XXXXX-XXXXX-XXXXXX" title="XXXXX-XXXXX-XXXXXX" pattern="[A-Za-z0-9]{5}-[A-Za-z0-9]{5}-[A-Za-z0-9]{6}" class="form-control" required>
                                    </div>

                                    <button type="submit" class="btn btn-blue btn-block btn-lg mt-3">
                                        Check Result
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

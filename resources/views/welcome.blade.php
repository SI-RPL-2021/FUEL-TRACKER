@extends('layout.main')

@section('body')
    <div class="bg-danger p-5 vh-100 d-flex flex-column">
        <div class="my-auto bg-white rounded px-5">
            <div class="row align-items-center">
                <div class="col-lg-6 py-5 d-flex">
                    <img width="100%" src="{{ asset('public/images/logo.png') }}" class="m-auto" alt="Image" />
                </div>
                <div class="col-lg-6 border-start p-5">
                    <div class="d-flex">
                        <div class="mx-auto w-100" style="max-width: 500px">
                            <h3 class="text-danger fw-bold text-center">Fuel Delivery Tracker</h3>
                            <h6 class="text-muted mb-3 text-center">Login untuk Melanjutkan.</h6>
                            <form action="{{url('/login_eval')}}" method="POST" >
                                @csrf
                                <div class="mb-3">
                                    <h6 for="username" class="form-label text-muted">Username</h6>
                                    <input type="text" class="form-control bg-light rounded-pill" name="username"
                                        aria-describedby="emailHelp">
                                    <div class="form-text">Gunakan username yang telah diberikan.</div>
                                </div>
                                <div class="mb-3">
                                    <h6 for='password' class="form-label text-muted">Password</h6>
                                    <input type="password" class="form-control bg-light rounded-pill" name="password">
                                </div>
                                <button type="submit" class="btn btn-success w-100 rounded-pill"
                                    style="background: #6AC335">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

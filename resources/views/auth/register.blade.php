@extends('layouts.html')

@section('content')
<div class="vh-100 m-0 p-0" style="background-color: #ff6321;">
    <div class="d-flex flex-column justify-content-center h-100">
        <div class="card mx-auto shadow rounded-4" style="width: 35rem;">
            <div class="card-body">
                <h1>Sign Up</h1>
                <p class="text-muted mb-4">Enter your details to create your Cosmic Fork account:</p>

                <form>
                    @csrf

                    <div class="row">

                        {{-- First Name --}}
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="firstName" class="form-label fw-bold">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" 
                                    placeholder="John">
                            </div>
                        </div>

                        {{-- Last Name --}}
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="lastName" class="form-label fw-bold">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" 
                                    placeholder="Doe">
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="col-12">
                            <div class="mb-4">
                                <label for="email" class="form-label fw-bold">Email</label>
                                <input type="text" class="form-control" id="email" name="email" 
                                    placeholder="johndoe@example.com">
                            </div>
                        </div>

                        {{-- Mobile Number --}}
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="mobileNumber" class="form-label fw-bold">Mobile Number</label>
                                {{-- <input type="text" class="form-control" id="mobile_number" name="mobile_number"> --}}
                                <div class="input-group mb-3">
                                    <span class="input-group-text">+63</span>
                                    <input type="text" class="form-control" id="mobileNumber" name="mobileNumber" placeholder="9171234567" maxlength="10">
                                </div>
                            </div>
                            
                        </div>

                        {{-- Birthday --}}
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="birthday" class="form-label fw-bold">Birthday</label>
                                <input type="text" class="form-control" id="birthday" name="birthday">
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="password" class="form-label fw-bold">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>

                        {{-- Confirm Password --}}
                        <div class="col-6">
                            <div class="mb-4">
                                <label for="confirmPassword" class="form-label fw-bold">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                            </div>
                        </div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="agreeCheckbox">
                        <label class="form-check-label" for="agreeCheckbox">
                            I agree with Cosmic Fork's <a href="#">User agreement</a> and <a href="#">Privacy Policy</a>
                        </label>
                    </div>

                    <div class="d-grid mt-5">
                        <button type="button" class="btn btn-primary rounded-4" id="submitBtn" disabled>
                            Sign Up
                        </button>
                    </div>

                    <div class="text-center mt-3">
                        Already have a Cosmic Fork account? <a href="/login">Log In</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
    
</div>
@endsection

@push('scripts')
    @vite('resources/js/auth/register.js')
@endpush
@extends('layouts.html')

@section('content')
    <div class="row vh-100 m-0 p-0">

        {{-- Login Column --}}
        <div class="col-4">
            <div class="d-flex flex-column justify-content-between h-100">

                {{-- Header --}}
                <div class="mt-5 pt-5 text-center">
                    <h1 class="display-6 fw-bold m-0">Log in</h1>
                    <span>or <a href="#">create account</a></span>
                </div>

                {{-- Body --}}
                <div class="mx-auto w-50">

                    <div id="alertError"></div>

					{{-- Login Form --}}
                    <form>
                        @csrf

                        {{-- Email Input --}}
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="text" class="form-control" id="email" name="email" 
                                placeholder="johndoe@example.com">
                        </div>
            
                        {{-- Password Input --}}
                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold">Password</label>
                            <input type="password" class="form-control" id="password" name="password" 
                                placeholder="Password">
                        </div>
            
                        <div class="d-grid mt-5 mb-3">
                            <button type="submit" class="btn btn-primary d-grid" id="btnSubmit">LOG IN</button>
                        </div>
                    </form>
                    
                    <div class="text-center">
                        <a href="#" class="mx-auto">Forgot password?</a>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="text-center mb-5 pb-5">
                    <span class="m-0">&copy; 2023 All Rights Reserved</span>
                    <br>
                    <span><a href="#">Privacy</a> and <a href="#">Terms</a></span> 
                </div>
                
            </div>   
        </div>

        {{-- Brand Column --}}
        <div class="col-8" style="background-color: #ff6321;">
            <div class="d-flex flex-column justify-content-center h-100 w-50 mx-auto text-white">
                <h1 class="display-1 fw-bold">Cosmic Fork</h1>
                <p class="mt-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Tristique magna sit amet purus gravida quis. Risus sed 
                    vulputate odio ut enim blandit volutpat maecenas.
                </p>
            </div>
        </div>
        
    </div>
@endsection

@push('scripts')
    @vite('resources/js/auth/login.js')
@endpush
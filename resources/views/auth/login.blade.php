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

                    <div id="error-alert"></div>

                    {{-- Error Alert Message --}}
					@if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span><strong>Error!</strong> {{ session('error') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
					@endif

					{{-- Login Form --}}
                    <form>
                        @csrf

                        {{-- Email Input --}}
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="text" class="form-control" id="email" 
                                name="email" placeholder="johndoe@mail.com" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
            
                        {{-- Password Input --}}
                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold">Password</label>
                            <input type="password" class="form-control" 
                                id="password" name="password" placeholder="Password">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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
    <script>
        const btnSubmit = document.getElementById('btnSubmit');
        
        btnSubmit.addEventListener('click', submitForm);

        async function submitForm(e) {
            e.preventDefault();
            loadSpinner();

            axios.post('/login', {
                email: document.getElementById('email').value,
                password: document.getElementById('password').value
            })
            .then((response) => {
                if (response.status === 200) {
                    window.location.href = '/home';
                }
            })
            .catch((error) => {
                removeErrorMessages();
                
                const errorArr = Object.entries(error.response.data.errors);
                for (const [key, value] of errorArr) {
                    if (key === 'general') {
                        createAlertMessage(value);
                    } else {
                        insertValidationMessage(key, value);
                    }
                }
                
                removeSpinner();
            });
        }

        function loadSpinner() {
            btnSubmit.innerHTML = '';
            btnSubmit.innerHTML = '<i class="fa-solid fa-spinner fa-spin mt-1 mb-1"></i>';
            btnSubmit.setAttribute('disabled', '');
        }

        function removeSpinner() {
            btnSubmit.innerHTML = '';
            btnSubmit.innerHTML = 'LOG IN';
            btnSubmit.removeAttribute('disabled');
        }

        function createAlertMessage(value) {
            document.getElementById('error-alert').innerHTML = `
                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="mainAlert">
                    <span>${value}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`;
        }

        function insertValidationMessage(key, value) {
            const div = document.createElement('div');
            div.classList.add('text-danger');
            div.innerText = value;
            document.getElementById(key).after(div);
        }

        function removeErrorMessages() {
            const mainAlert = document.getElementById('mainAlert');
            const errorMessages = document.getElementsByClassName('text-danger');
                
            if (mainAlert) {
                mainAlert.remove();
            }

            if (errorMessages.length > 0) {
                Array.from(errorMessages).forEach(element => element.remove());
            }
        }
    </script>
@endpush
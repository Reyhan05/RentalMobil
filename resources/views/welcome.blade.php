<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.css')

    
    <body class="container align-items-center text-light py-5 d-flex justify-content-center">
        <div class="left">
        <p class="fs-4 fw-light opacity-75">Selamat Datang di...</p>
            <h1 class="fw-bold my-3">Rental Mobil</h1>
            <p class="desc fs-4 my-4 opacity-75">Jasa penyewaan mobil di jakarta</p>

            <!-- <img src="url('/image/ilustrasi.jpg')" data-aos="fade-left" data-aos-duration="3000" class="model"/> -->

            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </body>
</html>

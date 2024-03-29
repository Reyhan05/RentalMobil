<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
            target="_blank">
            <img src="{{ asset('admin/templet/assets/img/sport-car.png')}}" class="navbar-brand-img h-100"
                alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Rental Mobil</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white  {{ Request::is('dashboard') ? 'bg-gradient-primary' : '' }}"
                    href="/dashboard">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Master Mobil</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('datamobil') ? 'bg-gradient-primary' : '' }}"
                    href="{{ route('datamobil.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bx bxs-car opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data Mobil</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white  {{ Request::is('datamerk') ? 'bg-gradient-primary' : '' }}"
                    href="/datamerk">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class='bx bxs-car-garage'></i>
                    </div>
                    <span class="nav-link-text ms-1">Data Merek</span>
                </a>
            </li>
            <li class="nav-item">
                <form class="nav-link text-white" action="{{ route('logout') }}" method="POST" id="signup-form">
                    @csrf
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bx bxs-log-out opacity-10"></i>
                    </div>
                    <button class="nav-link-text ms-1" >Sign Up</button>
                </form>
            </li>
        </ul>
    </div>
</aside>
@extends('layouts.js')
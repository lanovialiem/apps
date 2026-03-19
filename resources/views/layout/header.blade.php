<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Employee Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-5">

        <header class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm px-3 mb-5">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <!-- Logo image -->
                <img src="{{ url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZifFncu9QjR-Up9YFI61g4o9eua6ksyFT3Q&s') }}"
                    alt="Logo" width="40" height="40" class="me-2 rounded-circle">
                My Dashboard
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('employees.index') ? 'active fw-bold text-white' : '' }}"
                            href="{{ route('employees.index') }}">Employees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('medical_checkups.index') ? 'active fw-bold text-white' : '' }}"
                            href="{{ route('medical_checkups.index') }}">MCU</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('project.index') ? 'active fw-bold text-white' : '' }}"
                            href="{{ route('project.index') }}">Project List</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('penawaran.index') ? 'active fw-bold text-white' : '' }}"
                            href="{{ route('penawaran.index') }}">Penawaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('project_employee.index') ? 'active fw-bold text-white' : '' }}"
                            href="{{ route('project_employee.index') }}">Project Employees</a>
                    </li>
                </ul>
                <div class="ms-3 d-flex align-items-center">
                    {{-- <span class="text-white me-2">Hello, Admin</span> --}}
                    <button class="btn btn-outline-light btn-sm">Logout</button>
                </div>
            </div>
        </header>

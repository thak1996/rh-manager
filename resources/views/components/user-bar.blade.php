<div class="d-flex justify-content-between bg-color-1 text-white py-1 px-3">

    <!-- logo -->
    <div class="d-flex align-items-center">
        <a href="{{ route('home') }}" class="text-decoration-none text-white">
            <img src="{{ asset('assets/images/favicon.png') }}" alt="logo" width="50px" class="img-fluid">
        </a>
        <h4 class="ms-3 text-primary m-0 p-0">
            {{ config('app.name') }}
        </h4>
    </div>

    <!-- user -->
    <div class="d-flex align-items-center">
        <i class="fas fa-user-circle me-3"></i>
        <a href="{{ route('user.profile') }}" class="text-primary me-3">
            {{ auth()->user()->name ?? 'Visitante' }}
        </a>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-link text-white p-0">
                <i class="fas fa-sign-out-alt"></i>
            </button>
    </div>

</div>
<x-layout-guest pageTitle="Welcome">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col">
                <div class="text-center mb-5">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" width="200px">
                </div>
                <div class="card p-5 text-center">
                    <h1 class="mb-4">Welcome, <strong>{{ $user->name }}</strong></h1>
                    <p class="mb-4">Your account has been successfully created.</p>
                    <p>You can now <a href="{{ route('login') }}">log in</a> to your account.</p>
                </div>
            </div>
        </div>
    </div>
</x-layout-guest>
<x-layout-app pageTitle="User Profile">
    <div class="w-100 p-4">
        <h3>User Profile</h3>
        <x-profile-user-data />
        <div class="container-fluid m-0 p-0 mt-5">
            <div class="row">
                <div class="col-3">
                    <div class="border p-5 shadow-sm">
                        <form action="{{ route('user.profile-information') }}" method="put" novalidate>
                            @csrf
                            <h3>Change password</h3>
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Current password</label>
                                <input type="password" name="current_password" id="current_password" class="form-control" required>
                                @error('current_password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="new_password" class="form-label">New password</label>
                                <input type="password" name="new_password" id="new_password" class="form-control" required>
                                @error('new_password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="new_password_confirmation" class="form-label">Confirm new password</label>
                                <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
                                @error('new_password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Change password</button>
                            </div>

                        </form>

                        @if (session('error'))
                        <div class="alert alert-danger mt-3">
                            {{ session('error') }}
                        </div>
                        @endif
                        @if (session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-layout-app>
<div class="col-3">
    <div class="border p-5 shadow-sm">
        <form action="{{ route('user-password.update') }}" method="POST" novalidate>
            @csrf
            @method('PUT')
            <h3>Change password</h3>
            <div class="mb-3">
                <label for="current_password" class="form-label">Current password</label>
                <input type="password" name="current_password" id="current_password" class="form-control" required>
                @error('current_password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">New password</label>
                <input type="password" name="password" id="password" class="form-control" required>
                @error('password', 'updatePassword')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm new password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                @error('password_confirmation', 'updatePassword')
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
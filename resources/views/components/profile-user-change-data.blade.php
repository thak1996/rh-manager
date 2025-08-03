<div class="col-3">
    <div class="border p-5 shadow-sm">
        <form action="{{ route('user-profile-information.update') }}" method="post" novalidate>
            @csrf
            @method('PUT')
            <h3>Change user data</h3>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ auth()->user()->name }}" required>
                @error('name', 'updateProfileInformation')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email (Username)</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}" required>
                @error('email', 'updateProfileInformation')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update user data</button>
            </div>

        </form>
        @if(session('success_change_data'))
        <div class="alert alert-success mt-3">
            {{ session('success_change_data') }}
        </div>
        @endif
    </div>
</div>
<x-layout-app pageTitle="New Department">
    <div class="w-25 p-4">
        <h3>New department</h3>
        <hr>
        <form action="{{ route('departments.create-department') }}" method="post" novalidate>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Department name</label>
                <input type="text" class="form-control" id="name" name="name" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <a href="{{ route('departments') }}" class="btn btn-secondary me-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Create department</button>
            </div>
        </form>
    </div>
</x-layout-app>
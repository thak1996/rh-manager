<x-layout-app pageTitle="Edit Department">
    <div class="w-25 p-4">
        <h3>Edit department</h3>
        <hr>
        <form action="{{ route('departments.update-department', $department->id) }}" method="post" novalidate>
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $department->id }}">
            <div class="mb-3">
                <label for="name" class="form-label">Department name</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ old('name', $department->name) }}">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <a href="{{ route('departments') }}" class="btn btn-secondary me-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</x-layout-app>
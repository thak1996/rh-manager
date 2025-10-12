<x-layout-app page-title="New RH Colaborator">
    <div class="w-100 p-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <h3>New Human Resources Colaborator</h3>
                    <hr>
                    <form action="{{ route('colaborators.create-colaborator') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="d-flex">
                                <div class="flex-grow-1 pe-3">
                                    <label for="select_department" class="form-label">Department</label>
                                    <select class="form-select" name="select_department" id="select_department">
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('select_department')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <a href="{{ route('departments.new-department') }}"
                                        class="btn btn-outline-primary mt-4"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <p class="mb-3">Profile: <strong>Human Resources</strong></p>
                        <div class="mb-3">
                            <a href="{{ route('colaborators.rh-users') }}"
                                class="btn btn-outline-danger me-3">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create colaborator</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout-app>

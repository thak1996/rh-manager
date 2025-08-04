<x-layout-app pageTitle="Human resources">
    <div class="w-100 p-4">
        <h3>Human Resources Colaborators</h3>
        <hr>
        @if($colaborators->count() === 0)
        <div class="text-center my-5">
            <p>No colaborators found.</p>
            <a href="{{ route('departments.new-department')  }}" class="btn btn-primary">Create a new colaborator</a>
        </div>
        @else
        <div class="my-3">
            <a href="{{ route('departments.new-department') }}" class="btn btn-primary">Create a new colaborator</a>
        </div>
        <table class="table w-50" id="table">
            <thead class="table-dark">
                <th>Name</th>
                <th>Email</th>
                <th>Permissions</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($colaborators as $colaborator)
                <tr>
                    <td>{{ $colaborator->name }}</td>
                    <td>{{ $colaborator->email }}</td>
                    @php
                    $permissions = json_decode($colaborator->permissions);

                    @endphp
                    <td>{{ implode(', ', $permissions) }}</td>
                    <div class="d-flex gap-3 justify-content-end">
                        <a href="#" class="btn btn-sm btn-outline-dark"><i class="fa-regular fa-pen-to-square me-2"></i>Edit</a>
                        <a href="#" class="btn btn-sm btn-outline-dark"><i class="fa-regular fa-trash-can me-2"></i>Delete</a>
                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</x-layout-app>
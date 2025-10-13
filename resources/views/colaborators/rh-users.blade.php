<x-layout-app pageTitle="Human resources">
    <div class="w-100 p-4">
        <h3>Human Resources Colaborators</h3>
        <hr>
        @if ($colaborators->count() === 0)
            <div class="text-center my-5">
                <p>No colaborators found.</p>
                <a href="{{ route('colaborators.new-colaborator') }}" class="btn btn-primary">Create a new colaborator</a>
            </div>
        @else
            <div class="my-3">
                <a href="{{ route('colaborators.new-colaborator') }}" class="btn btn-primary">Create a new colaborator</a>
            </div>
            <table class="table" id="table">
                <thead class="table-dark">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Admission Date</th>
                    <th>City</th>
                    <th>Salary</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($colaborators as $colaborator)
                        <tr>
                            <td>{{ $colaborator->name }}</td>
                            <td>{{ $colaborator->email }}</td>
                            <td>{{ $colaborator->role }}</td>
                            @php
                                $permissions = json_decode($colaborator->permissions);
                            @endphp
                            <td>{{ implode(', ', $permissions) }}</td>
                            <td>{{ $colaborator->detail->admission_date }}</td>
                            <td>{{ $colaborator->detail->city }}</td>
                            <td>{{ $colaborator->detail->salary }}</td>
                            <td>
                                <div class="d-flex gap-3 justify-content-end">
                                    <a href="#" class="btn btn-sm btn-outline-dark"><i
                                            class="fa-regular fa-pen-to-square me-2"></i>Edit</a>
                                    <a href="#" class="btn btn-sm btn-outline-dark"><i
                                            class="fa-regular fa-trash-can me-2"></i>Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-layout-app>

<x-layout-app page-title="Delete colaborator">
    <div class="w-25 p-4">
        <h3>Delete colaborator</h3>
        <hr>
        <p>Are you sure you want to delete this colaborator?</p>
        <div class="text-center">
            <h3 class="my-5">{{ $colaborator->name }}</h3>
            <p>{{ $colaborator->email }}</p>
            <a href="{{ route('colaborators.all-colaborators') }}" class="btn btn-secondary px-5">No</a>
            <form action="{{ route('colaborators.delete-colaborator-confirm', $colaborator->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger px-5">Yes</button>
            </form>
        </div>
    </div>
</x-layout-app>
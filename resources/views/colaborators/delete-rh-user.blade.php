<x-layout-app pageTitle="Delete Colaborator">
    <div class="w-25 p-4">
        <h3>Delete Colaborator</h3>
        <hr>
        <p>Are you sure you want to delete this colaborator?</p>
        <div class="text-center">
            <h3 class="my-5">{{ $colaborator->name }}</h3>
            <a href="{{ route('colaborators.rh-users') }}" class="btn btn-secondary px-5">No</a>
            <form action="{{ route('colaborators.rh.delete-colaborator-confirm', $colaborator->id) }}" method="post" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger px-5">Yes</button>
            </form>
        </div>
    </div>
</x-layout-app>
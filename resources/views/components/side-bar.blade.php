<div class="d-flex flex-column sidebar pt-4">
    <a href="{{ route('home') }}"><i class="fas fa-home me-3"></i>Home</a>
    @can('admin')
    <a href="#"><i class="fas fa-users me-3"></i>Colaborators</a>
    <a href="{{ route('colaborators.rh-users')  }}"><i class="fas fa-users-gear me-3"></i>RH Colaborators</a>
    <a href="{{ route('departments') }}"><i class="fas fa-industry me-3"></i>Departaments</a>
    @endcan
    <hr>
    <a href="{{ route('user.profile') }}"><i class="fas fa-cog me-3"></i>User profile</a>
    <hr>
    <div class="text-center mt3">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-sm btb-outline-dark">
                <i class="fas fa-sign-out-alt me-2"></i>Logout
            </button>
        </form>
    </div>
</div>
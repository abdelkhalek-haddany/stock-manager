<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container d-flex justify-content-between">
        <a class="navbar-brand" href="{{ route('welcome') }}">Stock Management</a>

        @if (Auth::check())
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <div class="icon"> <i class="fa-solid fa-right-from-bracket"></i> </div>
                <button class="btn btn-primary" type="submit">
                    Logout</button>
            </form>
        @endif
    </div>
</nav>

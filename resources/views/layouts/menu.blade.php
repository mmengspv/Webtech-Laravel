<nav>
    <div class="flex">
        <a href="{{route('apartments.index')}}" class="border bg-green-700 text-white px-5 py-2 text-sm font-medium">Apartment List</a>
    
        <a href="{{route('tasks.index')}}" class="border bg-green-700 text-white px-5 py-2 text-sm font-medium">Task List</a>

        <a href="{{route('tags.index')}}" class="border bg-green-700 text-white px-5 py-2 text-sm font-medium">Tag List</a>

        @if(Auth::check())
            <a class="border bg-green-700 text-white px-5 py-2 text-sm font-medium">
                {{Auth::user()->name}}
            </a>
            <form action="{{route('logout')}}" class="border bg-green-700 text-white px-5 py-2 text-sm font-medium" method="POST">
                @csrf
                <button>LOGOUT</button>
            </form>
        @else
            <a href="{{route('login')}}" class="border bg-green-700 text-white px-5 py-2 text-sm font-medium">
                Login
            </a>
            <form action="{{route('register')}}" class="border bg-green-700 text-white px-5 py-2 text-sm font-medium" method="POST">
                @csrf
                <button>Register</button>
            </form>
        @endif
    </div>
</nav>
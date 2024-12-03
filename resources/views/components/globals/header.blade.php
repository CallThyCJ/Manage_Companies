<header>
    <div id="header" class="headerContainer">
        <div id="headerItems" class="globalContainer">
            <img src="{{ asset('assets/logo.png')}}">
            <a href="{{url("/")}}">Companies</a>
            <a href="{{url("/employees")}}">Employees</a>

            <div id="userMenu">
                @auth()
                <h3>{{Auth::user()->username}}</h3>

                    <form method="POST" action="{{route('user.logout')}}" enctype="multipart/form-data">
                        @csrf
                        <button>Log Out</button>
                    </form>
                @endauth

                @guest()
                    <a href="{{url("/register")}}">Register</a>
                        <a href="{{url("/login")}}">Log In</a>
                    @endguest


                <div id="userSubMenu">
                    <a>Profile</a>
                </div>
            </div>
        </div>
    </div>
</header>

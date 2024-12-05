<div id="navBar">
    <div id="navBarItems" class="globalContainer">
        <h2>{{Route::currentRouteName()}}</h2>

        <form method="GET" action="{{ $action ?? '#' }}" class="searchForm">
            <div id="searchBar">
                <input type="text" name="search" placeholder="Search {{Route::currentRouteName()}}..." value="{{ request('search') }}">
                <button type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </form>
    </div>
</div>

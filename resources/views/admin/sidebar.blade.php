<nav>
    <div class="auth" data-expandable>
        <img alt="Avatar - {{ auth()->user()->email }}" src="//gravatar.com/avatar/{{ hash('sha256', strtolower(trim(auth()->user()->email)))}}" title="{{ auth()->user()->name }}" />
        <span class="hide-on-mobile">{{ auth()->user()->name }}</span>
        <ul>
            <li>
                <a href="{{ route('admin.user-profile') }}">
                    @include('icons.user-circle')
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}">
                    @include('icons.arrow-right-start-on-rectangle')
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <ul>
        <li>
            <a href="{{ route('admin.home') }}" {{ request()->routeIs('admin.home') ? 'data-active' : '' }}>
                @include('icons.home', ['title' => 'Home']) 
                <span class="hide-on-mobile">Home</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.posts.index') }}" {{ request()->routeIs('admin.posts.*') ? 'data-active' : '' }}>
                @include('icons.document-text', ['title' => 'Blog Posts']) 
                <span class="hide-on-mobile">Blog Posts</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.settings') }}" {{ request()->routeIs('admin.settings') ? 'data-active' : '' }}>
                @include('icons.cog-8-tooth', ['title' => 'Settings']) 
                <span class="hide-on-mobile">Settings</span>
            </a>
        </li>
    </ul>
</nav>
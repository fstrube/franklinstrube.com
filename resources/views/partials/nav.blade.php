<ul class="navigation">
    <li class="menu-item {{ request()->routeIs('home') || request()->routeIs('blog.*') || request()->routeIs('tags.*') ? 'current-menu-item' : '' }}">
        <a href="/">Blog</a>
    </li>
    <li class="menu-item {{ request()->routeIs('projects') ? 'current-menu-item' : '' }}">
        <a href="/projects">Projects</a>
    </li>
    <li class="menu-item">
        <a href="#about">About</a>
    </li>
    <li class="menu-item">
        <a href="#contact">Contact</a>
    </li>
</ul>

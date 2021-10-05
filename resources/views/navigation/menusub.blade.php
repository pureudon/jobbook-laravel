<!-- menusub nav -->
<nav>
<nav id='nav2'>
    <ul>
    @if (isset($menu))
        @if ($menu=='customer')
            <li class="{{ ($submenu=='company') ? 'selected' : '' }}"><a href="{{ route('company.index') }}">Company</a></li>
        @elseif ($menu=='others')

        @endif
    @else
        <li><a href="#">Empty</a></li>
    @endif
    </ul>
</nav>
</nav>
<section id="nav2space">
    <br>
</section>

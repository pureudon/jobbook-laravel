<!-- menu nav -->
<nav>
<nav id="sidebar-nav">
    <ul class="nav nav-pills nav-stacked">
    @if (isset($menu))
        <li class="{{ ($menu=='customer') ? 'selected' : '' }}"><a href="{{ route('company.index') }}" target="_blank">Customer</a></li>
    @else
        <li ><a href='#'>Empty</a></li>
    @endif
    
    <li ><a href='#'>{{ auth()->user()->name }}</a></li>
    <li >
        <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
        this.closest('form').submit();">Logout</a>
        </form>
    </li>

    </ul>
</nav>
</nav>
<section id="navspace">
    <br>
</section>
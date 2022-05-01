
<div class="menu">
  <div>

  <a href="/"><strong>Home</strong></a>
</div>

  @if (Auth::guest())
  <div class="navright">
  <a href="{{ route('login') }}">Login</a>
</div>
<div>
  <a href="{{ route('register') }}">Register</a>
</div>

  @else
  <div class="navright">
  <a href="/yourreviews/{{ Auth::user()->id }}">
  Your Reviews
</a>
</div>
<div>
  <a href="{{ route('logout') }}"
  onclick="event.preventDefault();
  document.getElementById('logout-form').submit();">
  Logout
</a></div>
<div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
  {{ csrf_field() }}
</form>
</div>
@endif
</div>

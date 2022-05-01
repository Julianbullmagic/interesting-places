@extends('layouts.app')
@section('content')
<div class="form">
  <h1>Confirm Password</h1>
  Please confirm your password before continuing.
  <form method="POST" action="{{ route('password.confirm') }}">
    @csrf
    <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    @error('password')
    <span style="color:red" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
    <button type="submit">
      Confirm Password
    </button>
    @if (Route::has('password.request'))
    <a href="{{ route('password.request') }}">
      Forgot Your Password?
    </a>
    @endif
  </form>
</div>
@endsection

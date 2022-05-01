@extends('layouts.app')

@section('content')
<div class="form">
  <h1>Reset Password</h1>
  <form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

    @error('email')
    <span style="color:red" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

    @error('password')
    <span style="color:red" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror

    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    <button type="submit" class="btn btn-primary">
      {{ __('Reset Password') }}
    </button>
  </form>
</div>
@endsection

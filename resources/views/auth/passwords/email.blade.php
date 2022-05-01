@extends('layouts.app')
@section('content')
<div class="form">
  <h1>{{ __('Reset Password') }}</h1>

  @if (session('status'))
  <div style="color:red" role="alert">
    {{ session('status') }}
  </div>
  @endif
  <form method="POST" action="{{ route('password.email') }}">
    @csrf
    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

    @error('email')
    <span style="color:red" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
    <button type="submit" class="btn btn-primary">
      {{ __('Send Password Reset Link') }}
    </button>
  </form>
</div>
@endsection

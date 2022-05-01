@extends('layouts.app')

@section('content')
<div class="form">
                <h1>Login</h1>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                            <label for="email">Email Address</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="remember" style="display:inline">
                                    Remember Me
                                </label>
                                    <input style="display:inline" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <button type="submit" style="display:block">
                                    Login
                                </button>

                                @if (Route::has('password.request'))
                                    <a style="color:black;display:inline;" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                @endif
                    </form>
</div>
@endsection

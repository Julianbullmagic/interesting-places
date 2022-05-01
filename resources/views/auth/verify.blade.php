@extends('layouts.app')

@section('content')
<div class="form">
  <h1>Verify you email address</h1>

                    @if (session('resent'))
                        <div role="alert">
                            A fresh verification link has been sent to your email address
                        </div>
                    @endif

                    Before proceeding, please check your email for a verification link.
                    If you did not receive the email
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
</div>
@endsection

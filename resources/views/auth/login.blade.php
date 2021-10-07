@extends('layouts.app')
@section('content')
<form class="kt-form" method="post" action="{{ route('login') }}">
  @csrf
  <div class="input-group">
    <input class="form-control @error('email') is-invalid @enderror" type="text" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="input-group">
    <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" required autocomplete="current-password">
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="row kt-login__extra">
    <div class="col">
      <label class="kt-checkbox">
        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember me	<span></span>
      </label>
    </div>
    <div class="col kt-align-right">
      <a href="javascript:;" class="kt-link kt-login__link">Forget Password ?</a>
    </div>
  </div>
  <div class="kt-login__actions">
    <button class="btn btn-pill kt-login__btn-primary">Sign In</button>
  </div>
</form>
</div>
@endsection

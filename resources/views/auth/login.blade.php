@extends('../layouts/app')

@section('content')

<section class="login-content">
    <div class="logo">
      <h1>QueueT</h1>
    </div>
    <div class="login-box">
      <form class="login-form" action="{{ route('login') }}" method="POST">
        @csrf
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
        <div class="form-group">
          <label class="control-label">Email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="form-group">
          <label class="control-label">PASSWORD</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="form-group">
          <div class="utility">
            <div class="animated-checkbox">
              <label>
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <span class="label-text">Stay Signed in</span>
              </label>
            </div>
            <p class="semibold-text mb-2">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request')}}">Forgot Password ?</a>
                @endif
            </p>
          </div>
        </div>
        <div class="form-group btn-container">
          <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
        </div>
      </form>
    </div>
  </section>
@endsection

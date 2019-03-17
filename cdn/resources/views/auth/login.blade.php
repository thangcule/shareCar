@extends('layouts.app_default')

@section('content')
<div class="Layout-content">
    <div class="Home u-flex">
        <div class="HomeBlock-inner" >
            <div class="HomeBlock-media HomeBlock-media--primary HomeBlock-form" style="margin-left: 20%; width: 60%;">
                <h2 class="HomeBlock-title">Login</h2>
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="bla-input" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="bla-input" name="password" required placeholder="Password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
            
                    <div class="form-group">
                        <div class="checkbox">
                            <label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me</label>
                            <a href="{{ route('password.request') }}" >Forfot password</a>
                        </div>                  
                        <button class="bla-btn" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

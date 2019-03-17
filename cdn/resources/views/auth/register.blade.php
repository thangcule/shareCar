@extends('layouts.app_default')

@section('content')
<div class="Layout-content">
    <div class="Home u-flex">
        <div class="HomeBlock-inner" >
            <div class="HomeBlock-media HomeBlock-media--primary HomeBlock-form" style="margin-left: 20%; width: 60%;">
                <h2 class="HomeBlock-title">Register</h2>

                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input id="name" type="text" class="bla-input" name="name" value="{{ old('name') }}" autofocus placeholder="Name">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="bla-input" name="email" value="{{ old('email') }}"  autofocus placeholder="Email">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <input id="phone" type="text" class="bla-input" name="phone" value="{{ old('phone') }}"  autofocus placeholder="Phone">
                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="bla-input" name="password"  placeholder="Password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input id="password-confirm" type="password" class="bla-input" name="password_confirmation"  placeholder="Comfirm password">
                    </div>

                    <div class="form-group">          
                        <button class="bla-btn" type="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

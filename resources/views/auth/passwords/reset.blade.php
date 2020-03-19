<!DOCTYPE html>
<html>
<head>
  <title>Password Reset</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/custom.css">
  <style type="text/css">
    form {
        margin: 0 auto;
        max-width:250px;
    }
  </style>
</head>
  <body>
    @include('inc.navbar')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading text-center" style="font-size: 2.5em;">Password Reset</div>
            <div class="panel-body">
                <div class="row" style="margin: 0px;">
                    {!! Form::open(['url' => '/password/reset', 'method' => 'post', 'class' => 'form-horizontal']) !!}
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
                        <label class="control-label" for="email">Email:</label>
                        <div>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ $email or old('email') }}" required="required" autofocus/>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? 'has-error' : '' }}">
                        <label class="control-label" for="password">Password:</label>
                        <div>
                            <input type="text" class="form-control" id="password" name="password" placeholder="Enter password" required/>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        <label class="control-label" for="password-confirm">Confirm Password:</label>
                        <div>
                            <input type="text" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Enter password_confirmation" required/>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Reset Password</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <script src="/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript">
    /* Set the width of the side navigation to 250px */
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }

    /* Set the width of the side navigation to 0 */
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
    </script>
</body>
</html>
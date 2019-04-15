<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WAH Directory</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/materialize/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<div class="container">
  <br>
  <br>
    <div class="row">
        <div class="col s3"></div>
          <div class="card col s6" style="padding:0px 20px 0px 20px;">
              <form  role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}
                        <div class="row">
                          <div class="col s12">
                            <div class="card-image">
                              <img src="/img/5.png" />
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12{{ $errors->has('username') ? 'has-error' : '' }}">
                            <i class="material-icons prefix">perm_identity</i>
                            <input type="text" name="username" id="username" class="validate"/>
                            <label for="username">Enter your Username</label>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12 {{ $errors->has('password') ? 'has-error' : '' }}">
                            <i class="material-icons prefix">lock_outline</i>
                            <input class="validate" type="password" name="password" id="password"/>
                            <label for="password">Enter your password</label>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                          </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <button type="submit" name="btn_login" class="btn waves-effect indigo col s12">Login</button>
                            </div>
                        </div>
                      </form>
          </div>
        <div class="col s3"></div>
    </div>
</div> 
   <script src="/jquery/dist/jquery.min.js"></script>
   <script src="/materialize/js/materialize.min.js"></script>
</body>
</html>


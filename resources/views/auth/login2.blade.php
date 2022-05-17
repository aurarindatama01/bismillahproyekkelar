<!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>Login Admin</title>
    <link rel="stylesheet" href="login2.css" media="screen" title="no title">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
      <div class="login">

          <div class="avatar">
            <i class="fa fa-user"></i>
          </div>

          <<div class="card-header">{{ __('Login') }}</div>

          <div class="box-login">
            <i class="fas fa-envelope-open-text"></i>
            <input type="text" placeholder="Username">
          </div>

          <div class="box-login">
            <i class="fas fa-lock"></i>
            <input type="text" placeholder="Password">
          </div>

          <button type="submit" name="login" class="btn-login">Login</button>

      </div>
  </head>
  </html>
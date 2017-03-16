<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login pages</title>
  <link rel="stylesheet" href="<?=base_url();?>public/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url();?>public/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="<?=base_url();?>public/css/style.css">
</head>
<body>
  <div class="container login">
    <div class="row">
      <div class="col-xs-6 col-xs-offset-3">
        <div class="row">
          <div class="page-header">
            <h2>Login Admin</h2>
          </div>
        </div>
        <div class="row">
          <form class="form-horizontal" method="post" action=''>
            <div class="form-group">
              <label for="username" class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="username" placeholder="Username" name="username">
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" name="login">Sign in</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

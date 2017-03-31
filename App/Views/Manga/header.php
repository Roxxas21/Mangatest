<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> <?= $data['title']; ?> </title>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url();?>public/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url();?>public/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="<?=base_url();?>public/css/style.css">
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?=base_url();?>">MoeMoe</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="<?=base_url()?>home">New Releases</a></li>
          <li><a href="<?=base_url()?>home/list">Manga List</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Genre <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?=base_url()?>home/list/shonen">Shonen</a></li>
              <li><a href="<?=base_url()?>home/list/seinen">Seinen</a></li>
              <li><a href="<?=base_url()?>home/list/action">Action</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="<?=base_url()?>home/list/">Full List</a></li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
    <form class="navbar-form navbar-right" method="get" action="<?=base_url();?>home/list">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Cari Manga" name="cariManga" value="<?if(isset($_GET['cariManga'])) echo $_GET['cariManga']?>">
      </div>
    </form>
  </div><!-- /.navbar-collapse -->
</div><!-- /.container -->
</nav>

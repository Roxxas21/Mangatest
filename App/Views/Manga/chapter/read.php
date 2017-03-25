<!DOCTYPE html>
<html>
<head>
	<title><?= $data['title']; ?></title>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/css/style.css">
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="<?=base_url();?>home/manga/<?=$data['manga']?>/<?=$data['chapterNo']-1?>">Previous <span class="sr-only">(current)</span></a></li>
					<li><a href="<?=base_url();?>">Home</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><p class="navbar-text"><?= $data['manga'] ?> - Chapter <?= $data['chapterNo']; ?></p></li>
					<li><a href="<?=base_url()?>home/manga/<?=$data['manga']?>/<?=$data['chapterNo']+1;?>">Next</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container">
		<div class="row" id='chapterContent'>
			<div class="col-xs-12 col-sm-8 col-sm-offset-2">
				<?php foreach ($data['image'] as $image): ?>
					<img src="<?=base_url()?>home/image/<?=$image->id?>" alt="image" class="img-responsive">
				<?php endforeach; ?>
			</div>
		</div>
</div>

<script src="<?=base_url();?>public/js/jquery-3.1.1.min.js"></script>
<script src="<?=base_url();?>public/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>public/js/style.js"></script>
</body>
</html>

<?php $manga = $data['manga']; ?>
<?php include "header.php"; ?>
<div class="container">
  <div class="row">
    <div class="col-xs-8 col-xs-offset-2">
      <div class="row">
        <div class="page-header">
          <h2>Edit Manga</h2>
        </div>
      </div>
      <div class="row">
        <form class="form-horizontal" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" placeholder="Nama Manga" value="<?=$manga->name?>">
            </div>
          </div>
          <div class="form-group">
            <label for="genre" class="col-sm-2 control-label">Genre</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="genre" placeholder="Genre Manga" name="genre" value="<?=$manga->genre?>">
            </div>
          </div>
          <div class="form-group">
            <label for="synopsis" class="col-sm-2 control-label">Sysnopsis</label>
            <div class="col-sm-10">
              <textarea name="synopsis" rows="8" cols="80" class="form-control"><?= $manga->synopsis; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-warning btn-block">Edit Manga</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>

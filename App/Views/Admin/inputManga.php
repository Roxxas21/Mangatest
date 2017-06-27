<?php include "header.php"; ?>
<div class="container">
  <div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
      <div class="row">
        <div class="page-header">
          <h2>Input Manga</h2>
        </div>
      </div>
      <div class="row">
        <form class="form-horizontal" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" placeholder="Nama Manga" name="name">
            </div>
          </div>
          <div class="form-group">
            <label for="genre" class="col-sm-2 control-label">Genre</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="genre" placeholder="Genre Manga" name="genre">
            </div>
          </div>
          <div class="form-group">
            <label for="rating" class="col-sm-2 control-label">Rating</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="rating" placeholder="Rating Manga" name="rating">
            </div>
          </div>
          <div class="form-group">
            <label for="synopsis" class="col-sm-2 control-label">Cover</label>
            <div class="col-sm-10">
              <input type="file" name="cover">
            </div>
          </div>
          <div class="form-group">
            <label for="synopsis" class="col-sm-2 control-label">Sysnopsis</label>
            <div class="col-sm-10">
              <textarea name="synopsis" rows="8" cols="80" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-block btn-primary" name="inputManga">Simpan Manga</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>

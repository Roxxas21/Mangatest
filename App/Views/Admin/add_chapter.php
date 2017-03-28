<?php include "header.php" ?>
<?php $manga = $data['manga']; ?>
<div class="container">
  <div class="row">
    <div class="col-xs-8 col-xs-offset-2">
      <div class="row">
        <div class="page-header">
          <h2>Tambah Chapter</h2>
        </div>
      </div>
      <div class="row">
        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Nama Manga</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name='name' placeholder="Judul Komik" value="<?=$manga->name?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="noChapter" class="col-sm-2 control-label">No.Chapter</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="noChapter" placeholder="Nomer Chapter" name="noChapter">
            </div>
          </div>
          <div class="form-group">
            <label for="judulChapter" class="col-sm-2 control-label">Judul Chapter</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="judulChapter" placeholder="Judul Chapter" name="judulChapter">
            </div>
          </div>
          <div class="form-group">
            <label for="fileChapter" class="col-sm-2 control-label">File Zip</label>
            <div class="col-sm-10">
              <input type="file" id="fileChapter" name="fileChapter" accept="application/x-zip-compressed">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary btn-block" name="addChapter">Tambah Chapter</button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>

<?php include "footer.php" ?>

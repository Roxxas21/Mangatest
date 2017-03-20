<?php include "header.php"; ?>
<?php $manga = $data['manga']; ?>
<?php $chapter = $data['chapter']; ?>
<div class="container">
  <br>
  <div class="row">
    <div class="col-xs-8 col-xs-offset-2">
      <div class="row">
        <div class="thumbnail">
          <div class="caption">
            <div class="row">
              <div class="col-sm-3">
                <img src="<?=base_url()?>home/cover/<?=$manga->id?>" alt="cover manga" class="img-responsive">
              </div>
              <div class="col-sm-9">
                <h2><?= $manga->name ?></h2>
                <p class="genre"><?= $manga->genre ?></p>
                <p><?= $manga->synopsis; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <a type="button" name="button" class="btn btn-info btn-block" href="<?=base_url()?>admin/addChapter/<?=$manga->slug;?>">Tambah Chapter</a>
        </div>
        <div class="col-sm-6">
          <a type="button" name="button" class="btn btn-danger btn-block" href="<?=base_url();?>admin/delete/<?=$manga->id;?>">Delete Manga</a>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">Daftar Chapter</div>
          <div class="panel-body">
            <p><input type="text" name="cariChapter" value="" class="form-control" placeholder="Cari Manga"></p>
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th class="action">Hapus</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data['chapter'] as $chapter): ?>
                  <tr>
                    <td><?= $chapter->no ?></td>
                    <td><?= $chapter->judul?></td>
                    <td class="action">
                      <a type="button" name="button" class="btn btn-danger btn-xs btn-block" href="<?=base_url();?>admin/deletechapter/<?=$manga->slug;?>/<?=$chapter->id;?>">Hapus</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>

<?php include "header.php"; ?>
<div class="container">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2">
      <div class="row">
        <div class="page-header">
          <h2>Admin Panel</h2>
        </div>
      </div>
      <div class="row">
        <div class="panel panel-primary">
          <div class="panel-heading">Daftar Manga</div>
          <div class="panel-body">
            <p>Cari Manga Disini : </p>
            <p>
              <form class="" action="" method="get">
                <input type="text" name="cariManga" placeholder="Cari Manga" class="form-control">
              </form>
            </p>
          </div>
          <!-- table -->
          <?php if (count($data['manga']) > 0): ?>
          <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul Manga</th>
                  <th>Tools</th>
                  <th>Edit</th>
                  <th>Hapus</th>
                </tr>
                <tbody>
                  <?php $i = 0; ?>
                  <?php foreach ($data["manga"] as $manga): ?>
                    <tr>
                      <td><?= ++$i; ?></td>
                      <td><?= $manga->name; ?></td>
                      <td><a href="<?=base_url()?>admin/manga/<?=$manga->slug;?>" class="btn btn-xs btn-block btn-primary">Chapter</a></td>
                      <td><a href="<?=base_url()?>admin/edit/<?=$manga->id;?>" class="btn btn-xs btn-block btn-warning">Edit</a></td>
                      <td><a href="<?=base_url()?>admin/delete/<?=$manga->id;?>" class="btn btn-xs btn-block btn-danger">Hapus</a></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </thead>
            </table>
          <?php else: ?>
            <p class="panel-body">Maaf data yang anda cari tidak ditemukan</p>
          <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>

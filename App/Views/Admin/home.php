<?php include "header.php"; ?>
<div class="container">
  <div class="row">
    <div class="col-xs-8 col-xs-offset-2">
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
              <form class="" action="index.html" method="get">
                <input type="text" name="cariManga" placeholder="Cari Manga" class="form-control">
              </form>
            </p>
          </div>
          <!-- table -->
          <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Judul Manga</th>
                  <th>Tools</th>
                  <th>Edit</th>
                  <th>Hapus</th>
                </tr>
                <tbody>
                  <?php foreach ($data["manga"] as $manga): ?>
                    <tr>
                      <td><?= $manga->id; ?></td>
                      <td><?= $manga->name; ?></td>
                      <td><a href="<?=base_url()?>admin/manga/<?=$manga->slug;?>" class="btn btn-xs btn-block btn-primary">Chapter</a></td>
                      <td><a href="<?=base_url()?>admin/edit/<?=$manga->id;?>" class="btn btn-xs btn-block btn-warning">Edit</a></td>
                      <td><a href="<?=base_url()?>admin/delete/<?=$manga->id;?>" class="btn btn-xs btn-block btn-danger">Hapus</a></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>

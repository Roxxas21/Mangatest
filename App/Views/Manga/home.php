<?php include 'header.php' ?>
<div class="jumbotron">
 <div class="row">
   <div class="col-xs-10 col-xs-offset-1">
    <h1>MoeMoe Web Manga Project</h1>
  </div>
</div>
</div>
<div class="container">
  <div class="row">
    <main>
      <div class="col-xs-12 col-sm-8">
        <div class="panel panel-primary">
          <div class="panel-heading">New Releases</div>

          <div class="panel-body">
            <p>Daftar rilisan terbaru manga.</p>
            <p>
              <form class="" action="index.html" method="get">
                <input type="text" name="cariRilis" placeholder="Cari Rilisan" class="form-control">
              </form>
            </p>
          </div>

          <!-- Table -->
          <table class="table table-hover table-condensed releases">
            <thead>
              <tr>
                <th>Manga Name</th>
                <th>Chapter No</th>
                <th>Release Date</th>
                <th class="action">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data['releases'] as $releases): ?>
                <tr>
                  <td> <a href="<?=base_url();?>home/manga/<?=$releases->slug;?>"><?= $releases->name; ?></a></td>
                  <td><?= $releases->no; ?></td>
                  <td><?= $releases->rilis; ?></td>
                  <td><a href="<?=base_url();?>home/manga/<?=$releases->slug?>/<?=$releases->no;?>" class="btn  btn-xs btn-primary btn-block">Baca Manga</a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>

  </div> <!-- /row -->
</div>
<?php include 'footer.php'; ?>

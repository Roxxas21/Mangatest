<?php include 'header.php' ?>

<div class="container-fluid">
  <div class="row">
      <div class="jumbotron">
       <div class="row">
         <div class="col-xs-12">
          <h1>RealPI Project</h1>
        </div>
      </div>
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
          </div>

          <?php if(count($data['releases']) > 1){ ?>
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
          <?php } else { ?>
          <p class="panel-body">Maaf data yang anda cari tidak ditemukan</p>
          <?php } ?>
        </div>
      </div>
    </main>
    <aside class="col-xs-12 col-sm-4">
      <div class="list-group">
        <?php foreach ($data['topManga'] as $topManga): ?>
          <a type="button" name="button" class='list-group-item' href="<?= base_url(); ?>home/manga/<?=$topManga->slug?>"><?= $topManga->name; ?></a>
        <?php endforeach; ?>
      </div>
    </aside>

  </div> <!-- /row -->
  <div class="row">
    <div class="col-xs-12">
      <div class="page-header">
        <h2>Recomended Manga</h2>
      </div>
      <?php foreach ($data['recomendManga'] as $recomendManga) : ?>
      <div class="col-xs-3">
        <div class="thumbnail">
          <a href="<?=base_url();?>home/manga/<?=$recomendManga->slug?>">
            <img src="<?=base_url();?>home/cover/<?=$recomendManga->id;?>" alt="cover" class='img-responsive'>
          </a>
          <div class="caption">
            <a href="<?=base_url();?>home/manga/<?=$recomendManga->slug;?>">
              <h4><?=$recomendManga->name?></h4>
            </a>
            <p>Rating : <?= $recomendManga->rating; ?></p>
            <p>Genre : <?= $recomendManga->genre; ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>

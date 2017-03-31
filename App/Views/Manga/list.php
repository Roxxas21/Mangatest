<?php include "header.php"; ?>

<div class="container">
  <div class="row">
    <div class="col-xs-12">
        <div class="page-header">
          <h2>List manga</h2>
        </div>
      <div class="row">
      <?php if(count($data['list']) > 0): ?>
        <?php foreach ($data['list'] as $manga): ?>
              <div class="col-xs-12 col-sm-6">
                <div class="thumbnail">
                  <div class="row">
                    <div class="col-xs-6">
                      <img src="<?=base_url();?>home/cover/<?=$manga->id?>" class='img-responsive'>
                    </div>
                    <div class="col-xs-6">
                      <a href="<?=base_url();?>home/manga/<?=$manga->slug;?>">
                        <h3><?= $manga->name; ?></h3>
                      </a>
                      <p class="genre"><?=$manga->genre?></p>
                      <p><?= substr($manga->synopsis,0,200); ?>..</p>
                      <p><a href="<?=base_url()?>home/manga/<?=$manga->slug?>" class='btn btn-info btn-block'>Baca Manga</a></p>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="col-xs-4 col-xs-offset-4">
              <p>Maaf data yang anda cari tidak ditemukan</p>
            </div>
          <?php endif; ?>
      </div>
    </div>
  </div>

</div>

<?php include "footer.php"; ?>

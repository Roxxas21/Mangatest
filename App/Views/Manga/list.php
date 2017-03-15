<?php include "header.php"; ?>

<div class="container">
  <div class="row">
    <div class="col-xs-8 col-xs-offset-2">
      <div class="row">
        <div class="page-header">
          <h2>List manga</h2>
        </div>
      </div>
      <div class="row">
        <?php foreach ($data['list'] as $manga): ?>
          <div class="row">
            <div class="thumbnail">
            <div class="row">
              <div class="col-xs-4">
                <img src="<?=base_url();?>home/cover/<?=$manga->id?>" class='img-responsive'>
              </div>  
              <div class="col-xs-8">
                <h3><?= $manga->name; ?></h3>
                <p class="genre"><?=$manga->genre?></p>
                <p><?= $manga->synopsis; ?></p>
                <p><a href="<?=base_url()?>home/manga/<?=$manga->slug?>" class='btn btn-info btn-block'>Baca Manga</a></p>
              </div>            
            </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

</div>

<?php include "footer.php"; ?>
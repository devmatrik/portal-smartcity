<!--Subheader Start-->
<section class="wf100 subheader" style="background: url('<?php echo base_url('assets/portal')?>/img/hero-sub.png') no-repeat !important;">
  <div class="container">
      <h2>Detil Wisata </h2>
      <ul>
        <li> <a href="<?= base_url()?>">Beranda</a> </li>
        <li> Wisata </li>
      </ul>
  </div>
</section>
<!--Subheader End--> 
<div class="main-content p80">
  <div class="container">
    <div class="card" style="box-shadow: 0 0 5px;">
      <div class="card-body">
        <!-- <h5 class="card-title">Card title</h5> -->
        <div class="owl-carousel owl-theme" style="display:inline;">
            <?php 
			$event = $events->data;
//            $image_arr = explode(";", $event->uploadedfile);
  //          foreach( $image_arr as $x ): ?>
              <div class="item"> <img src="<?= $event->image ?>" alt="..."> </div>
            <?php //endforeach; ?>
        </div>
        <div class="new-txt">
          <ul class="news-meta">
            <li><?= $event->sub_judul ?></li>
          </ul>
          <h4><?= $event->judul ?></h4>
          <p><?php echo nl2br($event->isi_konten)?></p>
        </div>
      </div>
    </div>
  </div>
</div>
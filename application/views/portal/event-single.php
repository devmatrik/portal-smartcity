<!--Subheader Start-->
<section class="wf100 subheader" style="background: url('<?php echo base_url('assets/portal')?>/img/hero-submenu.svg') no-repeat !important; background-size: cover !important;">
  <div class="container">
      <h2>Detil Event </h2>
      <ul>
        <li> <a href="<?= base_url()?>">Beranda</a> </li>
        <li> Event </li>
      </ul>
  </div>
</section>
<!--Subheader End--> 
<div class="main-content p80">
  <div class="container">
    <div class="card" style="">
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
            <li><?php $start_date = strtotime( $event->tgl_event ); $sd = date( 'd M,Y', $start_date ); echo $sd;?> - <?php $start_end = strtotime( $event->tgl_berakhir ); $ed = date( 'd M,Y', $start_end ); echo $ed;?></li>
          </ul>
          <h4><?= $event->nama_event?></h4>
          <p><?php echo nl2br($event->isi_konten)?></p>
        </div>
      </div>
    </div>
  </div>
</div>
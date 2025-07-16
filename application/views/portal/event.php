<!--Subheader Start-->
<section class="wf100 subheader" style="background: url('<?php echo base_url('assets/portal')?>/img/hero-sub.png') no-repeat !important;">
  <div class="container">
      <h2>Event</h2>
      <ul>
        <li> <a href="<?= base_url()?>">Beranda</a> </li>
        <li> Event </li>
      </ul>
  </div>
</section>
<!--Subheader End--> 
<div class="main-content">
  <div class="events-wrapper events-listing">
      <div class="container">
        <div class="row">
          <?php foreach( $event as $evn ):
//            $gambarpertama=explode(";",$evn->uploadedfile); 
            $start_date = strtotime( $evn->tgl_event );
            $sd = date( 'd M Y', $start_date ); 
            //$jam_start = strtotime($evn->jam_start);
            //$dte = date('H:i',$jam_start);
          
          ?>
            <div class="col-md">
              <!--Event List Box Start-->
              <div class="event-list-box">
                  <ul>
                    <li class="edate"><strong><?= $sd;?></strong></li>
                    <li> <img src="<?= $evn->image ?>" alt="image-event"> </li>
                    <li class="event-title">
                        <h6> <a href="<?= base_url('Portal/eventSingle/').$evn->rowid?>"><?= $evn->nama_event?></a> </h6>
                        <span><?= $evn->isi_konten?></span> 
                        <br>
                        <!--p><i class="fas fa-map-marker-alt"></i> <?= $evn->jenis_event?></p-->
                    </li>
                    <li> <!-- <a href="#" class="join-now">Join Now</a> --> </li>
                  </ul>
                </div>
                <?php endforeach; ?>
              <!--Event List Box End--> 
              <div class="row">
                     <div class="site-pagination">
                        <nav aria-label="Page navigation">
                           <!-- <ul class="pagination">
                              <li> <a href="#" aria-label="Previous"> <span aria-hidden="true">«</span> </a> </li>
                              <li><a href="#">1</a></li>
                              <li><a href="#">2</a></li>
                              <li class="active"><a href="#">3</a></li>
                              <li><a href="#">4</a></li>
                              <li><a href="#">5</a></li>
                              <li> <a href="#" aria-label="Next"> <span aria-hidden="true">»</span> </a> </li>
                           </ul> -->
                           <?= $this->pagination->create_links(); ?>
                        </nav>
                     </div>
                  </div>
            </div>
        </div>
      </div>
  </div>
</div>
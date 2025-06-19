<style>
  .pp_social{
    display:none;
  }
</style>
<div class="main-slider wf100">
    <div class="home2-slider rev_slider_wrapper"> 
      
      <!-- START REVOLUTION SLIDER -->
      <div class="rev_slider_wrapper fullwidthbanner-container">
        <div id="rev-slider2" class="rev_slider fullwidthabanner">
          <ul>
          <?php foreach($banner as $bn):?>
            <li data-transition="fade"> <img src="<?= base_url('data/banner/'.$bn->image);?>"  alt="" width="1920" height="685" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1" >
              <div class="tp-caption  tp-resizeme" 
							data-x="left" data-hoffset="400" 
							data-y="top" data-voffset="175" 
							data-transform_idle="o:1;"         
							data-transform_in="x:[-75%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
							data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
							data-splitin="none" 
							data-splitout="none"
							data-start="700">
                <div class="slide-content-box text-white">
                  <h1><?php 
                  if(count(explode(" ",$bn->title)) >= 5){ 
                    // $arr = array_splice( explode(" ",$bn->title), 5, 0, ['</br>'] ); 
                    $arr = explode(" ",$bn->title);
                    $pos = 5;
                    $val = '<br>';
                    $arrm = array_merge(array_slice($arr, 0, $pos), array($val), array_slice($arr, $pos));
                    $result = implode(" ",$arrm);
                    echo $result; 
                  }else{
                    echo $bn->title;
                  }?></h1>
                  <!-- <h1><?=$bn->title?></h1> -->
                </div>
              </div>
              <div class="tp-caption  tp-resizeme" 
							data-x="left" data-hoffset="400" 
							data-y="top" data-voffset="345" 
							data-transform_idle="o:1;"         
							data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
							data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
							data-splitin="none" 
							data-splitout="none"
							data-start="700">
                <div class="slide-content-box">
                  <p style="color:#fff!important"><?= $bn->subtitle?></p>
                </div>
              </div>
              <!-- <div class="tp-caption  tp-resizeme" 
							data-x="left" data-hoffset="400" 
							data-y="top" data-voffset="410" 
							data-transform_idle="o:1;"         
							data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
							data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
							data-splitin="none" 
							data-splitout="none"
							data-start="700">
                <div class="slide-content-box"> <a href="#" class="con">Join us Now</a> </div>
              </div> -->
            </li>
          <?php endforeach;?>
          </ul>
        </div>
      </div>
      <!-- END REVOLUTION SLIDER --> 
      
    </div>
  </div>
  <!--Slider End--> 
  <!--Main Content Start-->
  <div class="main-content"> 
    <!--Mayor Msg with Video Start-->
    <section class="Mayor-video-msg">
      <div class="container">
        <div class="row">
        <?php foreach($banner_vid as $vbn):?>
          <div class="col-md-4 col-sm-5"> 
            <!--Mayor Msg Start-->
            <div class="city-tour gallery" style="text-align:center;"> 
              <!-- <a href="<?= $vbn->link_vid?>" data-rel="prettyPhoto" title="<?= $vbn->judul?>">
              <img src="<?= base_url('assets/portal/');?>images/playicon.png" alt=""></a>  -->
              <img src="<?= base_url('data/banner/'.$vbn->thumbnail);?>" alt="" > 
              <!-- <img src="<?= base_url('assets/images/');?>unsplash_UmV2wr-Vbq8.png" alt="" style="height:293px;width:390px">  -->
            </div>
            <!--Mayor Msg End--> 
          </div>
          <div class="col-md-8 col-sm-7">
            <div class="Mayor-welcome">
              <h5><?= $vbn->judul ?></h5>
              <p style="color: white !important ;">
              <?= $vbn->deskripsi ?>
              </p>
              <h6><?= $vbn->nama ?></h6>
              <strong><?= $vbn->tag ?></strong> 
            </div>
          </div>
        <?php endforeach;?>
        </div>
      </div>
    </section>
    <!--Mayor Msg with Video End--> 

    <!--Departments & Information Desk Start-->
    <section class="wf100 p75-50  depart-info bgd_portal">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="title-style-3">
              <h3>Departemen & Informasi</h3>
              <p>Baca Berita Terkini dan Artikel tentang Pemerintah </p>
            </div>
            <div class="row" id="dept">
			<?php $no=0; foreach ($dept as $dep) { $no++?>
				<div class="col-md-4 col-sm-4">
					<div class="deprt-icon-box"> <img src="data/dept/<?= $dep->image;?>" alt="">
					<h6> <a href="<?= $dep->lnk;?>"><?= $dep->nama_departemen;?></a> </h6>
					<a class="rm" href="<?= $dep->lnk;?>">More</a> </div>
				</div>
			<?php } ?>
            </div>
          </div>
          <div class="col-md-3">
            <div class="emergency-info">
              <h5>Saluran Bantuan & Layanan Darurat </h5>
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"> 
                <!--Panel Start-->
                <?php $no=0; foreach ($yan_rat as $yr) { $no++?>
                  <div class="panel">
                    <div class="panel-heading" role="tab" id="heading<?= $no;?>">
                      <h6> <a role="button" style="padding-right:30px;" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $no;?>" aria-expanded="true" aria-controls="collapse<?= $no;?>"> <?=$yr->nama_layanan?> </a> </h6>
                    </div>
                    <div id="collapse<?= $no;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $no;?>">
                      <div class="panel-body">
                        <ul>
                          <li> <i class="fas fa-phone"></i> <?= $yr->nomor_layanan?></li>
                          <li> <i class="fas fa-map-marker-alt"></i> <?= $yr->alamat_layanan?></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                <?php }?>
                <!--Panel End--> 
              </div>
            </div>
            <!-- <a href="#" class="jobs-link">open Vacancies</a>
            <ul class="reports">
              <li> <a href="#"><i class="fas fa-file-alt"></i> 2019 Economy Report</a> </li>
              <li> <a href="#"><i class="fas fa-file-alt"></i> 30 Days Plans of Govt.</a> </li>
              <li> <a href="#"><i class="fas fa-file-alt"></i> Court Case about TAX</a> </li>
            </ul> -->
          </div>
        </div>
      </div>
    </section>
    <!--Departments & Information Desk End--> 
    
    <!--City News Start-->
    <section class="wf100 city-news p75 bgd_portal" style="background-image: none;">
      <div class="container">
        <div class="title-style-3">
          <h3>Update Dengan Berita Kota</h3>
          <p>Baca Berita Terkini dan Artikel tentang Pemerintah </p>
        </div>
        <div class="row"> 
          <!--News Box Start-->
          <?php $no=0; foreach($artikel->data as $ar): $no++; if($no>4){break;}?>
            <div class="col-md-3 col-sm-6">
              <div class="news-box">
                <div class="new-thumb"> <span class="cat c1"><?= $ar->jenis_berita?></span> <img src="<?= $ar->image;?>" alt=""> </div>
                <div class="new-txt">
                  <ul class="news-meta">
                    <li><?= $ar->ctddate?></li>
                    <!-- <li>176 Comments</li> -->
                  </ul>
                  <h6><a href="<?= base_url('Portal/beritaSingle/').$ar->rowid?>"><?= $ar->judul_news ?></a></h6>
                  <p> <?= (str_word_count($ar->isi_konten) > 4) ? substr($ar->isi_konten,0,50)."..." : $ar->isi_konten ?> </p>
                </div>
                <!-- <div class="news-box-f"> <img src="<?= base_url('assets/portal/');?>images/tuser1.jpg" alt=""> Johny Stewart <a href="#"><i class="fas fa-arrow-right"></i></a> </div> -->
              </div>
            </div>
          <?php endforeach;?>
          <!--News Box End--> 
        </div>
      </div>
    </section>
    <!--City News End--> 
    
    <!--Recent Events Start-->
    <section class="wf100 p75 recent-events">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <h3>Kegiatan Terkini</h3>
            <div class="recent-event-block"> 
              <!--Slider Big Slider Start-->
              <div class="recent-event-slider" id="eventBig">
			  <?php $no=0; foreach($events->data as $ev){ $no++; if($no>5) {break; } ?>
				<div class="event-big">
                  <div class="event-cap">
                    <h5><a href="#"><?= $ev->nama_event ?></a></h5>
                    <!--ul>
                      <li><i class="fas fa-image"></i></li>
                    </ul-->
                    <p style="color:#fff!important;"><?= $ev->isi_konten ?></p>
                  </div>
                  <img src="<?= $ev->image ?>" alt=""> 
				</div>
			  <?php } ?>
              </div>
              <!--Slider Big Slider End--> 
              <!--Slider Big Slider Nav-->
              <div class="recent-event-slider-nav" id="eventSmall">
			  <?php $no=0; foreach($events->data as $ev){ $no++; if($no>5) {break; } ?>
				<div><img src="<?= $ev->image ?>" alt=""></div>
			  <?php }?>
              </div>
              <!--Slider Big Slider Nav--> 
            </div>
          </div>
          <div class="col-md-7">
            <h3>Jadwal</h3>
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#NextEvents" aria-controls="NextEvents" role="tab" data-toggle="tab">Akan Datang</a></li>
              <li role="presentation"><a href="#NowEvents" aria-controls="NowEvents" role="tab" data-toggle="tab">Sekarang</a></li>
              <li role="presentation"><a href="#DoneEvents" aria-controls="DoneEvents" role="tab" data-toggle="tab">Yang Lalu</a></li>
            </ul>
            <!-- Tab panes -->
<?php
$skr=date("Y-m-d");
$evnow=array();
$evnex=array();
$evpas=array();
foreach($events->data as $ev){
	$evs=''.
		'<ul class="event-list">'.
			'<li><strong class="edate">'.date("j M Y",strtotime($ev->tgl_event)).' - <br />'.date("j M Y",strtotime($ev->tgl_berakhir)).'</strong></li>'.
			'<li><img src="'.$ev->image.'" style="width:80px;height:70px;" alt=""></li>'.
			'<li class="el-title">'.
			'<h6><a href="Portal/eventSingle/'.$ev->rowid.'">'.$ev->nama_event.'</a></h6>'.
			'</li>'.
		'</ul>';
	if(substr($ev->tgl_event,0,10)>$skr){
		$evnex[]=$evs;
	}
	if(substr($ev->tgl_event,0,10)<=$skr && substr($ev->tgl_berakhir,0,10)>=$skr){
		$evnow[]=$evs;
	}
	if(substr($ev->tgl_berakhir,0,10)<$skr){
		$evpas[]=$evs;
	}
	if(count($evpas)>5){ break; }
}
?>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="NextEvents"> 
				<?php echo implode("",$evnex)?>
              </div>
              <div role="tabpanel" class="tab-pane" id="NowEvents">
				<?php echo implode("",$evnow)?>
              </div>
              <div role="tabpanel" class="tab-pane" id="DoneEvents">
				<?php echo implode("",$evpas)?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Recent Events End--> 
    <section class="wf100 home3 emergency-numbers">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-5">
            <div class="newsletter-form">
              <h5>TERDAPAT DI</h5>
              <ul class="row">
                <li class="col-md-6" style="margin-bottom:10px">
                  <!-- <input type="text" class="form-control" placeholder="Your Name"> -->
                  <a href="https://play.google.com/store/apps/details?id=com.gamatechno.solodestinationnew" target="_blank">
                    <img src="<?= base_url('assets/portal/img/playstore.png')?>" alt="" style="width: 240px ;height:100px">
                  </a>
                </li>
                <li class="col-md-6">
                  <!-- <input type="text" class="form-control" placeholder="Email Address"> -->
                  <a href="https://apps.apple.com/id/app/solo-destination/id1403225542" target="_blank">
                    <img src="<?= base_url('assets/portal/img/appstore.png')?>" alt="" style="width: 240px ;height:100px">
                  </a>
                </li>
                <!-- <li class="col-md-6">
                  <p>Signup to get the updates on email from the city &amp; town affairs!</p>
                </li>
                <li class="col-md-6">
                  <button>Subscribe</button>
                </li> -->
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-sm-7">
            <div class="e-numbers">
              <h5>Nomor Darurat</h5>
              <p>Hubungi nomor-nomor ini jika terjadi keadaan darurat</p>
              <div class="info-num"> <strong></strong>
                <!-- <h3>(08)00 9876</h3> -->
              </div>
              <ul class="row">
                <li class="col-md-4 col-sm-4">
                  <div class="em-box"> <i class="fas fa-exclamation-circle"></i> <strong class="em-num">119</strong> <strong class="em-deprt">Gawat Darurat</strong> </div>
                </li>
                <li class="col-md-4 col-sm-4">
                  <div class="em-box"> <i class="fas fa-ambulance"></i> <strong class="em-num">118</strong> <strong class="em-deprt"> Layanan Ambulan </strong> </div>
                </li>
                <li class="col-md-4 col-sm-4">
                  <div class="em-box"> <i class="fas fa-phone-square"></i> <strong class="em-num">117</strong> <strong class="em-deprt">Gangguan Telepon</strong> </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

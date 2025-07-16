<!--Subheader Start-->
<section class="wf100 subheader" style="background: url('<?php echo base_url('assets/portal')?>/img/hero-sub.png') no-repeat !important;">
  <div class="container">
      <h2>Tentang Kami </h2>
      <ul>
        <li> <a href="<?= base_url()?>">Beranda</a> </li>
        <li> Tentang </li>
      </ul>
  </div>
</section>
<!--Subheader End--> 
<!--Main Content Start-->
<div class="main-content">
  <!--Local Boards & Services-->
  <section class="wf100 p80-0 Mayor-video-msg" style="background-image: none;">
    <div class="container">
      <div class="row">
          <div class="col-md-12 col-sm-7">
            <div class="Mayor-welcome">
              <!--img src="../assets/images/LOGO-ELING.png" alt="" style="width: 170px;margin-bottom:5rem"-->
				
    <!--Departments & Information Desk Start-->
    <section class="wf100 depart-info">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="title-style-3">
              <h3>Departemen & Informasi</h3>
              <!--p>Baca Berita Terkini dan Artikel tentang Pemerintah </p-->
            </div>
            <div class="row" id="dept">
			<?php $no=0; foreach ($dept as $dep) { $no++?>
				<div class="col-md-4 col-sm-4" style="margin-bottom:20px;">
				<a class="rm" href="<?= $dep->lnk;?>">
				<img src="<?= base_url('assets/portal/img/').$dep->image;?>" alt="">
				</a>
					<!--div class="deprt-icon-box"> 
					<h6> <a href="<?= $dep->lnk;?>"><?= $dep->nama_departemen;?></a> </h6>
					More</a> </div-->
				</div>
			<?php } ?>
            </div>
          </div>
          <div class="col-md-3" style="display:none;">
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
    
            </div>
          </div>
          
      </div>
    </div>
  </section>
  <!--Local Boards & Services End--> 
  

  <!--Local Boards & Services Start-->

  <!--Local Boards & Services End--> 
  <!-- Explore Community End--> 
</div>
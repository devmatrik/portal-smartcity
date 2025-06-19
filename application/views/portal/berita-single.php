<?php
$artikel=$art->data;
?>
<!--Sub Header Start-->
         <section class="wf100 subheader" style="background: url('<?php echo base_url('assets/portal')?>/img/hero-submenu.svg') no-repeat !important; background-size: cover !important;">
            <div class="container">
               <h2>Detail Berita</h2>
               <ul>
                  <li> <a href="index.html">Beranda</a> </li>
                  <li> <a href="#">Berita</a> </li>
               </ul>
            </div>
         </section>
         <!--Sub Header End--> 
         <!--Main Content Start-->
         <div class="main-content p80">
            <!--News Details Page Start-->
            <div class="news-details">
               <div class="container">
                  <div class="row">
                     <!--Content Col Start-->
                     <div class="col-md-9">
                       <div class="new-thumb"> 
                          <a href="#">
                            <i class="fas fa-link"></i></a> 
                            <span class="cat c4"><?= $artikel->jenis_berita?></span> 
                            <img src="<?= $artikel->image?>" alt=""> 
                        </div>
                        <div class="news-box" style="height: auto;">
                          <div class="new-txt">
                            <ul class="news-meta">
                                <li><?= date('d M Y',strtotime($artikel->ctddate))?></li>
                            </ul>
                            <h4><?= $artikel->judul_news?></h4>
                            <p><?php echo nl2br($artikel->isi_konten)?></p>
                          </div>
                        </div>
                     </div>
                     <!--Content Col End--> 
                     <!--Sidebar Start-->
                     <div class="col-md-3">
                        <div class="sidebar">
                           <!--Widget Start-->
                           <!-- <div class="widget">
                           <h4>About us</h4>
                              <div class="about-widget inner">
                                 <img src="images/about-widget-img.jpg" alt="">
                                 <p> On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment. </p>
                                 <a href="#">More About us</a> 
                              </div>
                           </div> -->
                           <!--Widget End--> 
                           <!--Widget Start-->
                           <div class="widget">
                            <h4>Post Lalu</h4>
                              <div class="recent-posts inner">
                                 <ul>
                                    <?php 
									$i=0;
									foreach ($recentAr->data as $ra) {
									if($ra->rowid<$artikel->rowid){
									$i++;
									?>
                                       <li>
                                          <img src="<?=$ra->image?>" alt=""> <strong><?= date('Y-m-d',strtotime($ra->ctddate))?></strong>
                                          <h6> <a href="<?= base_url('Portal/beritaSingle/').$ra->rowid?>"><?= $ra->judul_news?> </a> </h6>
                                       </li>
                                    <?php }
									if($i>5){break;}
									}
									?>
                                 </ul>
                              </div>
                           </div>
                           <!--Widget End--> 
                           <!--Widget Start-->
                           <!-- <div class="widget">
                           <h4>Categories</h4>
                              <div class="categories inner">
                                 <ul>
                                    <li><a href="#">Latest Updates</a></li>
                                    <li><a href="#">Economical Stability</a></li>
                                    <li><a href="#">Educational Institutes</a></li>
                                    <li><a href="#">Speeches &amp; Videos</a></li>
                                    <li><a href="#">Latest Updates</a></li>
                                    <li><a href="#">Foreign Policies</a></li>
                                 </ul>
                              </div>
                           </div> -->
                           <!--Widget End--> 
                           <!--Widget Start-->
                           <div class="widget" style="display:none;">
                           <h4>Post Berikutnya</h4>
                              <div class="recent-posts inner">
                                 <ul>
                                    <?php 
									$i=0;
									foreach ($recentAr->data as $ra) {
									if($ra->rowid>$artikel->rowid){
									$i++;
									?>
                                       <li>
                                          <img src="<?=$ra->image?>" alt=""> <strong><?= date('Y-m-d',strtotime($ra->ctddate))?></strong>
                                          <h6> <a href="<?= base_url('Portal/beritaSingle/').$ra->rowid?>"><?= $ra->judul_news?> </a> </h6>
                                       </li>
                                    <?php }
									if($i>2 || $ra->rowid==$artikel->rowid){break;}
									}
									?>
                                 </ul>
                              </div>
                           </div>
                           <!--Widget End--> 
                           <!--Widget Start-->
                           <!-- <div class="widget">
                            <h4>Archives</h4>
                              <div class="archives inner">
                                
                                 <ul>
                                    <li><a href="#">May 2019</a></li>
                                    <li><a href="#">April 2019</a></li>
                                    <li><a href="#">March 2019</a></li>
                                    <li><a href="#">February 2019</a></li>
                                    <li><a href="#">January 2019</a></li>
                                    <li><a href="#">March 2017</a></li>
                                 </ul>
                              </div>
                           </div> -->
                           <!--Widget End--> 
                           
                           <!--Widget Start-->
                           <div class="widget" style="display:none;">
                            <h4>Tags</h4>
                              <div class="tags-widget inner">
                                 <?php foreach ($tags as $t) {?>
                                    <a href="#"><?= $t->kategori?></a>
                                 <?php }?>
                                
                              </div>
                           </div>
                           <!--Widget End--> 
                        </div>
                     </div>
                     <!--Sidebar End--> 
                  </div>
               </div>
            </div>
            <!--News Details Page End--> 
         </div>
         <!--Main Content End--> 
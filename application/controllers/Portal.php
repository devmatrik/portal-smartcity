<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends CI_Controller {

	private $title = "Portal Smart City Yogya";

	public function __construct()
	{
		parent::__construct();
        /*$this->load->model('MArtikel','ma');
        $this->load->model('MBanner','mb');
        $this->load->model('MEvent','me');
        $this->load->model('MDept','md');
        $this->load->model('MTentang','mt');
        $this->load->model('MYanrat','my');
		*/
		$this->load->model('MApi','api');
	}

	public function index()
	{
		//$q = $this->ma->getKategori()->result();
		//$ar = $this->ma->getArtikel('',4)->result();
		//$yan = $this->my->get('',['status' => 1])->result();
		//$bn = $this->mb->get('',['status' => 1],'',3)->result();
		//$vbn = $this->mb->getvid('',['status' => 1],'',1)->result();
		
		$ar=$this->api->get('news');
		$ev=$this->api->get('event');
		
		$arx=json_decode($ar[1]);
		$artix=isset($arx->data)?$arx->data:array();
		
		 //echo json_encode($ar);die();
		 //print_r(json_decode($ev[1])); die();
		$evx=json_decode($ev[1]);
		$evtx=isset($evx->data)?$evx->data:array();
		
		$data = [
			'title' => $this->title,
			'events' => $evtx,
			'artikel' => $artix,
			'dept' => array(
					(object)array("image"=>"opsdal.svg","nama_departemen"=>"Opsdal","lnk"=>base_url("Portal/detailDept/1")),
					(object)array("image"=>"media-management.svg","nama_departemen"=>"Media","lnk"=>base_url("Portal/detailDept/2")),
					(object)array("image"=>"data-collecting.svg","nama_departemen"=>"Media","lnk"=>base_url("Portal/detailDept/3")),
					(object)array("image"=>"patroli-cctv.svg","nama_departemen"=>"Media","lnk"=>base_url("Portal/detailDept/4")),
					(object)array("image"=>"public-service.svg","nama_departemen"=>"Media","lnk"=>base_url("Portal/detailDept/5")),
					(object)array("image"=>"it-aset.svg","nama_departemen"=>"Media","lnk"=>base_url("Portal/detailDept/6"))),
			'banner' => array((object)array("image"=>'hero.png',"title"=>'',"subtitle"=>'')),
			'banner_vid' => array((object)array("link_vid"=>'',"thumbnail"=>'banner.svg',"judul"=>'Bandung Smart City',
			"deskripsi"=>'Bandung Smart City dengan pendekatan Road Safety Policing adalah model dan cara serta alat untuk mendukung terwujudnya kondisi kota yang aman, selamat, tertib, dan lancar dengan melakukan kolaborasi antara Kepolisian dan Pemerintah Kota Bandung',
			"nama"=>'Electronic Policing',"tag"=>'Sistem Pemolisian berbasis elektronik')),
			'yan_rat' => array((object)array("nama_layanan"=>"Pemadam Kebakaran","nomor_layanan"=>"113","alamat_layanan"=>""),
					(object)array("nama_layanan"=>"Polisi","nomor_layanan"=>"110","alamat_layanan"=>""),
					(object)array("nama_layanan"=>"PLN","nomor_layanan"=>"123","alamat_layanan"=>"")),
			'link' =>  'index',
			'js' => [
                base_url('assets/js_local/pages/portal.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}

	public function beritaSingle($id)
	{
		//$ar = $this->ma->getArtikel($id)->row();
		//$recentAr = $this->ma->getResentArtikelPerhari()->result();
		//$tags = $this->ma->getKategori()->result();
		//$event = $this->me->get('',['status' => 1],'','3')->result();
		$ar=$this->api->get("news/$id");
		$arall=$this->api->get("news");
		//print_r(json_decode($ar[1])); die();
		
		$data = [
			'title' => $this->title,
			'art' => json_decode($ar[1]),
			'recentAr' => json_decode($arall[1]),
			'tags' => [],
			'event' => [],
			'link' => 'berita-single',
			'js' => [
                //base_url('assets/js_local/pages/berita-single.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}

	public function berita($from=0)
	{
		// $q = $this->ma->getKategori()->result();
		// $ar = $this->ma->getArtikel()->result();
		$ar=$this->api->get('news');
		//print_r($ar); die();
		$arx=json_decode($ar[1]);
		$news=isset($arx->data)?$arx->data:array();
		
		$this->load->library('pagination');
		$jumlah_data_berita = count($news);
		$config['base_url'] = base_url().'Portal/berita/';
		$config['total_rows'] = $jumlah_data_berita;
		$config['per_page'] = 8;
		$config['next_link'] = '»';
		$config['prev_link'] = '«';
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		//$from = $this->uri->segment(3);
		$this->pagination->initialize($config);
		$data = [
			'artikel' => array_slice($news,$from,$config['per_page']),
			'link' =>  'berita'
		];
		$this->load->view('main_portal',$data);
	}

  public function eventSingle($id)
	{
		$ev = $this->api->get("event/$id");
		// $event = $this->me->get('',['status' => 1],'','3')->result();
		$data = [
			'title' => $this->title,
			'events' => json_decode($ev[1]),
			// 'event' => $event,
			'link' => 'event-single',
			'js' => [
        // base_url('assets/js_local/pages/event.js'),
        //base_url('assets/js_local/pages/event-singel.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}

	public function getEvnt($id)
	{
		$ev = $this->me->get($id)->row();
		echo json_encode($ev);
	}


  public function event($from=0)
	{
    // $event = $this->me->get()->result();
	$ev=$this->api->get('event');
	$evx=json_decode($ev[1]);
	$events=isset($evx->data)?$evx->data:array();
	
    $this->load->library('pagination');
		$jumlah_data_event = count($events);
		$config['base_url'] = base_url().'Portal/event/';
		$config['total_rows'] = $jumlah_data_event;
		$config['per_page'] = 10;
		$config['next_link'] = '»';
		$config['prev_link'] = '«';
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		//$from = $this->uri->segment(3);
		$this->pagination->initialize($config);
		$data = [
        'event' => array_slice($events,$from,$config['per_page']),
      // 'event' => $event,
			'title' => $this->title,
			'link' =>  'event',
			'js' => [
                //base_url('assets/js_local/pages/event.js'),
                base_url('assets/js_local/pages/event-singel.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}
	
	public function tentang(){
		$data = [
			'title' => $this->title,
			'link' =>  'about',
			'dept' => array(
					(object)array("image"=>"opsdal.svg","nama_departemen"=>"Opsdal","lnk"=>base_url("Portal/detailDept/1")),
					(object)array("image"=>"media-management.svg","nama_departemen"=>"Media","lnk"=>base_url("Portal/detailDept/2")),
					(object)array("image"=>"data-collecting.svg","nama_departemen"=>"Media","lnk"=>base_url("Portal/detailDept/3")),
					(object)array("image"=>"patroli-cctv.svg","nama_departemen"=>"Media","lnk"=>base_url("Portal/detailDept/4")),
					(object)array("image"=>"public-service.svg","nama_departemen"=>"Media","lnk"=>base_url("Portal/detailDept/5")),
					(object)array("image"=>"it-aset.svg","nama_departemen"=>"Media","lnk"=>base_url("Portal/detailDept/6"))),
			'banner' => array((object)array("image"=>'hero.svg',"title"=>'',"subtitle"=>'')),
			'banner_vid' => array((object)array("link_vid"=>'',"thumbnail"=>'banner.svg',"judul"=>'Bandung Smart City',
			"deskripsi"=>'Bandung Smart City dengan pendekatan Road Safety Policing adalah model dan cara serta alat untuk mendukung terwujudnya kondisi kota yang aman, selamat, tertib, dan lancar dengan melakukan kolaborasi antara Kepolisian dan Pemerintah Kota Yogya',
			"nama"=>'Electronic Policing',"tag"=>'Sistem Pemolisian berbasis elektronik')),
			'yan_rat' => array((object)array("nama_layanan"=>"Pemadam Kebakaran","nomor_layanan"=>"113","alamat_layanan"=>""),
					(object)array("nama_layanan"=>"Polisi","nomor_layanan"=>"110","alamat_layanan"=>""),
					(object)array("nama_layanan"=>"PLN","nomor_layanan"=>"123","alamat_layanan"=>"")),
			'js' => [
                //base_url('assets/js_local/pages/about.js'),
			],
		];
		
		$this->load->view('main_portal',$data);
	}


	public function tentanglama()
	{
    // $tentang = $this->mt->get()->result();
    $this->load->library('pagination');

		$jumlah_data = $this->mt->jumlah_data();
		$config['base_url'] = base_url().'Portal/tentang';
		$config['total_rows'] = $jumlah_data;
		// $config['per_page'] = 10;
		$config['per_page'] = 1;
		$config['next_link'] = '»';
		$config['prev_link'] = '«';
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);
    
		$data = [
      'event' => $this->mt->data_event_about(),
      'link' =>  'event',
			'title' => $this->title,
			'link' =>  'about',
      'tentang' => $this->mt->data_tentang($config['per_page'],$from),
			'js' => [
                base_url('assets/js_local/pages/about.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}

	public function dept()
	{
		$data = [
			'title' => $this->title,
			'link' =>  'dept',
			'js' => [
                base_url('assets/js_local/pages/dept.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}
	
	private function getDept($id){
		$ret=(object)array("nama_departemen"=>"","image"=>"","deskripsi_dept"=>"");
		switch($id){
			case 1: $ret=(object)array("nama_departemen"=>"Operasi dan Pengendalian","image"=>"opsdal.svg","deskripsi_dept"=>"Divisi yang bertugas sebagai operasi dan pengendali dari kegiatan, proses laporan masyarakat yang akan diproses menggunakan dengan standart operasional yang ada"); 
					break;
			case 2: $ret=(object)array("nama_departemen"=>"Media Management","image"=>"media-management.svg","deskripsi_dept"=>"Divisi yang bertugas untuk memantau, memposting, dan interaksi dengan media sosial, baik itu twitter, facebook, instagram, tiktok ataupun youtube"); 
					break;
			case 3: $ret=(object)array("nama_departemen"=>"Data Collecting","image"=>"data-collecting.svg","deskripsi_dept"=>"Divisi yang bertugas untuk mengumpulkan semua data-data yang diperlukan divisi lain, dan juga untuk kebutuhan algoritma."); 
					break;
			case 4: $ret=(object)array("nama_departemen"=>"Patroli CCTV","image"=>"patroli-cctv.svg","deskripsi_dept"=>"Divisi yang bertugas untuk memantau kondisi lalu lintas, termasuk didalamnya kejadian seperti kemacetan, kecelakaan, pelanggaran, kegiatan yang bisa terpantau oleh kamera"); 
					break;
			case 5: $ret=(object)array("nama_departemen"=>"Public Service","image"=>"public-service.svg","deskripsi_dept"=>"Divisi yang bertugas untuk menerima, berinteraksi, dan memonitor laporan masuk dari masyarakat, baik itu melalui aplikasi, media sosial, maupun dari telephone");  
					break;
			case 6: $ret=(object)array("nama_departemen"=>"IT and Asset Management","image"=>"it-aset.svg","deskripsi_dept"=>"Divisi yang bertugas untuk memonitor perangkat hardware dan juga jaringan"); 
					break;
		}
		return array($ret);
	}

	public function detailDept($id="")
	{
		$dept = $this->getDept($id);
		//$ktg_id = explode(',',$dept[0]->kategori_ar_id);
		//$ar = $this->ma->getArtikel('',3,$ktg_id)->result();
		$data = [
			'title' => $this->title,
			'link' =>  'detaildept',
			'dept' => $dept,
			'artikel' => [],//$ar,
			'js' => [
                //base_url('assets/js_local/pages/detaildept.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}

	public function maps()
	{
		$data = [
			'link' =>  'maps',
			'js' => [
                base_url('assets/js_local/pages/custom.js'),
                base_url('assets/js_local/pages/maps.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}
	
	
	public function wisataSingle($id)
	{
		$ev = $this->api->get("wisata/$id");
		// $event = $this->me->get('',['status' => 1],'','3')->result();
		$data = [
			'title' => $this->title,
			'events' => json_decode($ev[1]),
			// 'event' => $event,
			'link' => 'wisata-single',
			'js' => [
        // base_url('assets/js_local/pages/event.js'),
        //base_url('assets/js_local/pages/event-singel.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}
	public function wisata($from=0)
	{
    // $event = $this->me->get()->result();
	$ev=$this->api->get('wisata');
	$evx=json_decode($ev[1]);
	$events=isset($evx->data)?$evx->data:array();
	
    $this->load->library('pagination');
		$jumlah_data_event = count($events);
		$config['base_url'] = base_url().'Portal/wisata/';
		$config['total_rows'] = $jumlah_data_event;
		$config['per_page'] = 5;
		$config['next_link'] = '»';
		$config['prev_link'] = '«';
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		//$from = $this->uri->segment(3);
		$this->pagination->initialize($config);
		$data = [
        'event' => array_slice($events,$from,$config['per_page']),
      // 'event' => $event,
			'title' => $this->title,
			'link' =>  'wisata',
			'js' => [
                //base_url('assets/js_local/pages/event.js'),
                //base_url('assets/js_local/pages/event-singel.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}
	
	public function publictrans(){
		$data = [
			'title' => $this->title,
			'link' =>  'trans',
			'js' => [
                //base_url('assets/js_local/pages/about.js'),
			],
		];
		
		$this->load->view('main_portal',$data);
	}

}

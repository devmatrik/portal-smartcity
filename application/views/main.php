<?php $this->load->view('_partial/head');?>
<body>
		<div id="global-loader" >
			<img src="<?=base_url();?>assets/images/svgs/loader.svg" alt="loader">
		</div>

	<div class="page">
		<div class="page-main">
		
			<?php $this->load->view('_partial/header');?>
		
			<?php $this->load->view('_partial/menu');?>
			<div class="app-content page-body">
				
				<div class="container">
					<?php $this->load->view('page/'.$link);?>
				</div>
				
			</div>
		</div>
		
		<?php $this->load->view('_partial/footer')?>
	</div>
	
	<!-- core:js -->
	<?php $this->load->view('_partial/script');?>
</body>
</html>    
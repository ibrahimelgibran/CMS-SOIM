<?php 
$base_path = FCPATH;
?>
<div class="post-head mb-4"> 
Agenda
</div> 
<div class="row">
	<?php
	  foreach ($agenda->result_array() as $r) {	
		  $tgl_posting = tgl_indo($r['tgl_posting']);
		  $tgl_mulai   = tgl_indo($r['tgl_mulai']);
		  $tgl_selesai = tgl_indo($r['tgl_selesai']);
		  $baca = $r['dibaca']+1;
		  $judul = $r['tema'];
		  $isi_agenda =(strip_tags($r['isi_agenda'])); 
		  $isi = substr($isi_agenda,0,280); 
		  $isi = substr($isi_agenda,0,strrpos($isi," "));		
		  $img_src = base_url()."asset/foto_agenda/small_no-image.jpg";
		  if ($r['gambar'] !== '' &&  file_exists( $base_path ."asset/foto_agenda/".($r['gambar']) ) ){
				$img_src = base_url()."asset/foto_agenda/". $r['gambar'];
		  }	
		  $img_size = getimagesize($img_src);
		  $class_image= ($img_size[0] > $img_size[1]) ? 'landscape':'portrait'; 
		  ?>
			<div class="col-md-12 mb-4">
			  <div class="agenda card h-100">
		  			<div class="row">
						<div class="col-md-4">
							<div class="card card-image"> 
								<div class="image-container" 
										style="
											background:url('<?php echo $img_src;?>');
											background-position:center;
											background-size:cover;
											background-repeat:no-repeat
										">
								</div>  
							</div>
						</div>
						<div class="col-md-8">
							<div class="card card-content">
								<div class="card-body">
									<a href="<?php echo base_url()."agenda/detail/".$r['tema_seo'];?>">
										<h3 class="card-title"><?php echo $judul;?></h3>
									</a>
									<div class="post-meta"> 
										<i class="fa fa-calendar"></i> <?php echo  $tgl_posting; ?> ,
										dilihat <?php echo $baca;?> x 
									</div>

									<div class="card-text mb-2">
										<?php echo $isi;  ?>
									</div> 
									<a href="<?php echo base_url()."agenda/detail/".$r['tema_seo'];?>" class="read-more">
										Selengkapnya
									</a> 
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		  <?php 		 
	  }
?>
</div>
<div class="pagination">
	<?php echo $this->pagination->create_links(); ?>
</div> 
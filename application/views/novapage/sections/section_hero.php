<?php 
$get_section_hero    = $this->model_utama->view_where('tbl_novapage',array('key' => 'section_hero'))->row_array();
if(isset($get_section_hero['value'])){
	if(!empty($get_section_hero['value'])){
		$section_hero = json_decode($get_section_hero['value'],true);
	}
} 
?>
 <?php if( !empty($section_hero['item'])) {?>
<div class="section-slider-hero"> 
    <div id="carouselHero" class="carousel slide" data-ride="carousel"> 
        <div class="carousel-inner" role="listbox">
            <?php foreach($section_hero['item'] as $i =>  $item) {?>
                <div class="carousel-item <?php echo ($i == 0 ? 'active' : '');?>">
                    <div class="carousel-content">
                        <div class="image-container"
							style="
                                background:url('<?php echo base_url('asset/img_novapage/images/'.$item['gambar']);?>'); 
								background-position:center;
								background-size:cover;
								background-repeat:no-repeat
							"> 
                        </div> 
                            <div class="carousel-caption">
                                <div class="container carousel-caption-body">
                                    <h1 class="py-3"><?php echo $item['judul'];?></h1>
                                    <div class="caption-content"> <?php echo strip_tags($item['deskripsi']);?></div>
                                    <div class="button-link"> 
                                        <?php 
                                            $url_link = '#';
                                            if( $item['tipe_link'] =='halaman') {
                                                $url_link = base_url('halaman/detail/'.$item['link_halaman']);
                                            } else {
                                                $url_link = $item['link_url'];
                                            }
                                        ?>
                                        <a href="<?php echo $url_link;?>" class="btn btn-theme btn-read-more py-2">
                                            <?php echo (empty(trim($item['link_label'])) ? 'Selengkapnya' : $item['link_label']);?>
                                        </a> 
                                    </div>
                                </div>
                            </div> 

                    </div>
                </div>                 
            <?php }?>
        </div>
        <a class="carousel-control-prev" href="#carouselHero" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselHero" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div> 
</div> 
<?php }?> 
<?php
$this->load->helper('text'); 
$get_section_services    = $this->model_utama->view_where('tbl_novapage',array('key' => 'section_services'))->row_array();
if(isset($get_section_services['value'])){
	if(!empty($get_section_services['value'])){
		$section_services = json_decode($get_section_services['value'],true);
	}
} 
?>

<!-- <div id="<?php echo $item ;?>" class="section section-services"
<?php 
    $skema_warna = 'default';
    switch ($section_services['skema_warna']) {
        case 'image':
            $skema_warna = 'bg-image';
            ?>
            style="background:url('<?php echo base_url('asset/img_novapage/images/'.$section_services['background']);?>');
                    background-attachment: scroll; 
                    background-size:cover;
                    background-position:center;
                background-repeat:no-repeat"
            <?php
            break;
        case 'dark':
            $skema_warna = 'dark';
            break;
        case 'light':
            $skema_warna = 'light';
            break;            
        default:             
            $skema_warna = 'default';
            break;
    }
?> > 
    <div class="section-container <?php echo $skema_warna;?>">
        <div class="container">
            <div class="card py-4">
                <?php if( !empty($section_services['judul'])) { ?>
                    <h2 class="card-header section-title">
                        <?php echo strtoupper($section_services['judul']);?>
                    </h2>
                <?php } ?>
                <?php if( !empty($section_services['deskripsi'])) { ?>
                    <div class="section-description">
                        <?php echo $section_services['deskripsi'];?>
                    </div>
                <?php } ?> 
                <div class="card-body">
                    <div class="row justify-content-center"> 
                        <?php if(!empty($section_services['item'])) { ?>
                            <?php foreach($section_services['item'] as $item) { ?>
                                <div class="col-lg-4 mb-4 col-py-10">
                                    <div class="card card-border h-100 icon-grid grid-slide-up"> 
                                        <h1 class="text-center icon-header">
                                            <i class="<?php echo $item['icon'];?>"></i>
                                        </h1>
                                        <?php 
                                            $url_link = '#';
                                            if( $item['link_halaman'] !=='') {
                                                $url_link = base_url('halaman/detail/'.$item['link_halaman']);
                                            }
                                        ?>
                                        <div class="card-body text-center icon-body">
                                            <a href="<?php echo $url_link;?>">
                                                <h5 class="icon-title"><?php echo $item['judul'];?></h5>
                                            </a>
                                            <div class="text mb-4">
                                                <?php echo $item['deskripsi'];?>
                                            </div>
                                            <div class="button-link">
                                                <a href="<?php echo $url_link;?>">
                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>  -->
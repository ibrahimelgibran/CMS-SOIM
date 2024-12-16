<?php
$get_section_cta    = $this->model_utama->view_where('tbl_novapage',array('key' => 'section_cta'))->row_array();
if(isset($get_section_cta['value'])){
	if(!empty($get_section_cta['value'])){
		$section_cta = json_decode($get_section_cta['value'],true);
	}
}
 
?>

<div id="<?php echo $item ;?>" class="section section-cta "  
    <?php 
        $skema_warna = 'default';
        switch ($section_cta['skema_warna']) {
            case 'image':
                $skema_warna = 'bg-image';
                ?>
                style="background:url('<?php echo base_url('asset/img_novapage/images/'.$section_cta['background']);?>');
                    background-attachment: fixed; 
                    background-size:cover;
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
    ?>    
    >
    <div class="section-container <?php echo $skema_warna;?>">
        <div class="container">
            <div class="card py-5"> 
                <div class="card-body">
                    <div class="row"> 
                            <div class="col-lg-12">
                                <div class="body-container">
                                    <div class="body-content center">
                                        <?php echo $section_cta['text'];?>
                                        <div class="pt-4">
                                            <a class="btn btn-theme btn-theme-cta btn-lg" href=" <?php echo $section_cta['url'];?>">
                                                <?php echo $section_cta['label'];?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
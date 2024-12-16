<?php 

$get_section_faq    = $this->model_utama->view_where('tbl_novapage',array('key' => 'section_faq'))->row_array();
if(isset($get_section_faq['value'])){
	if(!empty($get_section_faq['value'])){
		$section_faq = json_decode($get_section_faq['value'],true);
	}
}
 
?>

<div id="<?php echo $item ;?>" class="section section-faq"
<?php 
    $skema_warna = 'default';
    switch ($section_faq['skema_warna']) {
        case 'image':
            $skema_warna = 'bg-image';
            ?>
            style="background:url('<?php echo base_url('asset/img_novapage/images/'.$section_faq['background']);?>');
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
?> >
    <div class="section-container <?php echo $skema_warna;?>">
        <div class="container">
            <div class="card py-4">
                <?php if( !empty($section_faq['judul'])) { ?>
                <h2 class="card-header section-title">
                    <?php echo strtoupper($section_faq['judul']);?>
                </h2>
                <?php } ?>
                <?php if( !empty($section_faq['deskripsi'])) { ?>
                <div class="section-description">
                    <?php echo $section_faq['deskripsi'];?>
                </div>
                <?php } ?> 
                <div class="card-body">
                    <div class="row justify-content-center">
                        <?php if( !empty($section_faq['item'])) {?> 
                            <div class="mb-4 col-md-10">
                                <div class="body-container p-2"> 
                                    <ul class="accordion faq">
                                        <?php foreach( $section_faq['item'] as $faq ): ?> 
                                            <li> 
                                                <div class="question">
                                                    <?php echo $faq['tanya'];?> <i class="fa fa-question" aria-hidden="true"></i>
                                                </div> 
                                                <div class="answer">
                                                    <?php echo $faq['jawaban'];?>
                                                </div>
                                            </li>    
                                        <?php endforeach;?>
                                    </ul> 
                                </div>
                            </div> 
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div> 
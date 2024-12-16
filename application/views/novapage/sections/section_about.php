<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<?php
$this->load->helper('text');
$get_section_about    = $this->model_utama->view_where('tbl_novapage',array('key' => 'section_about'))->row_array();
if(isset($get_section_about['value'])){
	if(!empty($get_section_about['value'])){
		$section_about = json_decode($get_section_about['value'],true);
	}
}
 
?> 

<div id="<?php echo $item ;?>" class="section section-about">
<?php 
    $skema_warna = 'default';
    switch ($section_about['skema_warna']) {
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
    <div class="section-container py-5 <?php echo $skema_warna;?>">
        <div class="container">
            <div class="card my-5">
                <div class="card-body card-about-body">
                    <div class="row">
                        <div class="col-md-6 item-about">
                            <div class="cardh-100">
                                <div class="card-body">
                                    <?php if( !empty($section_about['judul'])) { ?>
                                    <h2 class="card-header" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                                        <?php echo strtoupper($section_about['judul']);?>
                                    </h2>
                                    <?php } ?>
                                    <?php if( !empty($section_about['deskripsi'])) { ?>
                                    <div class="description mb-4">
                                        <?php echo $section_about['deskripsi'];?>
                                    </div>
                                    <?php } ?> 
                                    <div class="button-link" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                                        <?php 
                                            $url_about = '#';
                                            if( $section_about['tipe_link'] =='halaman') {
                                                $url_about = base_url('halaman/detail/'.$section_about['link_halaman']);
                                            } else {
                                                $url_about = $section_about['link_url'];
                                            }
                                        ?>
                                        <a href="https://iegcode.com" class="btn btn-theme btn-read-more">
                                        Check Menu 
                                        </a> 
                                        <a href="<?php echo $url_about;?>" class="btn btn-theme btn-read-more">
                                            <?php echo (empty(trim($section_about['link_label'])) ? 'Selengkapnya' : $section_about['link_label']);?>
                                        </a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 item-about">
                            <div class="card h-100  p-3">
                                <img src="asset/img_novapage/images/<?php echo $section_about['gambar'];?>" style="width:100%;" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div> 
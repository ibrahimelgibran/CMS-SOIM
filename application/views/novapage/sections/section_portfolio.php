<?php
$get_section_portfolio    = $this->model_utama->view_where('tbl_novapage',array('key' => 'section_portfolio'))->row_array();
if(isset($get_section_portfolio['value'])){
	if(!empty($get_section_portfolio['value'])){
		$section_portfolio = json_decode($get_section_portfolio['value'],true);
	}
} 

// get portfolio 
if( isset($section_portfolio['jumlah'])) {
$get_portfolio = $this->db->query("
    SELECT 
        portfolio.id_portfolio as id,
        portfolio.nama_project as nama,
        portfolio.nama_client as client,
        portfolio.deskripsi as deskripsi,
        portfolio.url as url,
        portfolio.image as image
    FROM 
        tbl_novapage_portfolio portfolio
    ORDER BY portfolio.nama_project ASC 
    LIMIT 0,".$section_portfolio['jumlah']
)->result_array(); 
}
?>

<div id="<?php echo $item ;?>" class="section section-porfolio">
<?php 
    $skema_warna = 'default';
    switch ($section_portfolio['skema_warna']) {
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
    <div class="section-container <?php echo $skema_warna;?>">
        <div class="container">
            <div class="card py-4">
                <?php if( !empty($section_portfolio['judul'])) { ?>
                <h2 class="card-header section-title">
                    <?php echo strtoupper($section_portfolio['judul']);?>
                </h2>
                <?php } ?>
                <?php if( !empty($section_portfolio['deskripsi'])) { ?>
                <div class="section-description">
                    <?php echo $section_portfolio['deskripsi'];?>
                </div>
                <?php } ?> 
                <div class="card-body">
                    <div class="row justify-content-center">
                        <?php if( !empty($get_portfolio)) {?>
                            <?php
                                switch ((int) $section_portfolio['layout']) { 
                                    case 2:
                                        $layout = '6'; 
                                        break;                                    
                                    case 3:
                                        $layout = '4'; 
                                        break;                  
                                    default:                             
                                        $layout = '6'; 
                                        break;
                                }
                            ?>
                            <?php foreach($get_portfolio as $item) {?>
                            <div class="mb-4 col-md-6 col-lg-<?php echo $layout;?>  col-py-10">
                                <div class="card card-border h-100 card-portfolio"> 
                                    <?php 
                                    if ($item['image'] !==''){
                                        $img_src =base_url().'asset/img_novapage/portfolio/'.$item['image'];
                                    } 
                                    ?>
                                    <img width="100%" src="<?php echo $img_src;?>" alt="<?php echo $item['nama'];?>">
                                                    
                                    <div class="card-body text-center description">
                                        <h4 class="body-title center">
                                            <?php echo $item['nama'];?>
                                        </h4> 
                                    </div>           
                                </div>
                            </div>                    
                            <?php }?> 
                                <div class="col-12 text-center">
                                    <a href="<?php echo base_url('portfolio');?>" class="read-more">                                    
                                        <?php echo (empty(trim($section_portfolio['label_link'])) ? 'Selengkapnya' : $section_portfolio['label_link']);?>
                                    </a> 
                                </div>  
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div> 
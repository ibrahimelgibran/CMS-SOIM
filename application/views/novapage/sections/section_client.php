<?php
$get_section_client = $this->model_utama->view_where('tbl_novapage',array('key' => 'section_client'))->row_array();
if(isset($get_section_client['value'])){
	if(!empty($get_section_client['value'])){
		$section_client = json_decode($get_section_client['value'],true);
	}
} 

// get client logo 
$get_client = array();
if(isset($section_client['jumlah'])) {
    $get_client = $this->db->query("
        SELECT 
            client.id_client as id,
            client.nama as nama,
            client.logo as logo
        FROM 
            tbl_novapage_client client 
        ORDER BY client.nama ASC 
        LIMIT 0,".$section_client['jumlah']
    )->result_array(); 
}
?>

<div id="<?php echo $item ;?>" class="section section-client">
<?php 
    $skema_warna = 'default';
    switch ($section_client['skema_warna']) {
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
                <?php if( !empty($section_client['judul'])) { ?>
                <h2 class="card-header section-title">
                    <?php echo strtoupper($section_client['judul']);?>
                </h2>
                <?php } ?>
                <?php if( !empty($section_client['deskripsi'])) { ?>
                <div class="section-description">
                    <?php echo $section_client['deskripsi'];?>
                </div>
                <?php } ?> 
                <div class="card-body">
                    <div class="row justify-content-center">
                        <?php if( !empty($get_client)) {  ?>
                            <?php foreach($get_client as $item) {?>
                            <div class="mb-4 col-md-4 col-lg-3 col-py-10">
                                <div class="card card-border h-100 item-client">

                                    <?php 
                                    if ($item['logo'] !==''){
                                        $img_src =base_url().'asset/img_novapage/client/'.$item['logo'];
                                    } 
                                    ?>
                                    <img width="100%" src="<?php echo $img_src;?>" alt="<?php echo $item['nama'];?>">
                                </div>
                            </div>                    
                            <?php }?> 
                        <?php }?>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div> 
<?php
$this->load->helper('text');
$get_section_berita    = $this->model_utama->view_where('tbl_novapage',array('key' => 'section_berita'))->row_array();
if(isset($get_section_berita['value'])){
	if(!empty($get_section_berita['value'])){
		$section_berita = json_decode($get_section_berita['value'],true);
	}
} 
// get berita
$where = '';
if(!empty($section_berita['kategori'])) {
    $where = ' AND b.id_kategori = "'.$section_berita['kategori'].'"';
}

if(!empty($section_berita['jumlah'])) {
    $get_berita = $this->db->query("
                SELECT 
                    b.id_berita as id,
                    b.judul as judul,                
                    b.judul_seo as judul_seo,       
                    b.isi_berita as isi_berita, 
                    b.gambar as gambar,                    
                    b.tanggal as tanggal,
                    k.nama_kategori as nama_kategori,
                    k.kategori_seo as kategori_seo,
                    u.nama_lengkap as nama_lengkap
                FROM 
                    berita b 
                    JOIN users u on u.username = b.username 
                    JOIN kategori k on k.id_kategori = b.id_kategori
                WHERE
                    b.status = 'Y' ".
                    $where .
                "ORDER BY tanggal DESC LIMIT 0,".$section_berita['jumlah'])->result_array(); 
}
?>

<div id="<?php echo $item ;?>" class="section section-news"> 
<?php 
    $skema_warna = 'default';
    switch ($section_berita['skema_warna']) {
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
                <?php if( !empty($section_berita['judul'])) { ?>
                <h2 class="card-header section-title">
                    <?php echo strtoupper($section_berita['judul']);?>
                </h2>
                <?php } ?>
                <?php if( !empty($section_berita['deskripsi'])) { ?>
                <div class="section-description">
                    <?php echo $section_berita['deskripsi'];?>
                </div>
                <?php } ?> 
                <div class="card-body">
                    <div class="row justify-content-center">
                        <?php if( !empty($get_berita)) {?>
                            <?php
                                switch ((int) $section_berita['layout']) { 
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
                            <?php foreach($get_berita as $berita) {?>
                            <div class="mb-4 col-md-6 col-lg-<?php echo $layout;?> col-py-10">
                                <div class="card card-border h-100 card-news"> 
                                    <?php
                                    $img_src= base_url().'asset/foto_berita/small_no-image.jpg';
                                    if ($berita['gambar'] !==''){
                                        $img_src =base_url().'asset/foto_berita/'.$berita['gambar'];
                                    } 
                                    ?> 
                                    <div class="post-img-container"
                                        style="background:url('<?php echo $img_src;?>');
                                                background-position:center;
                                                background-size:cover;
                                                background-repeat:no-repeat;
                                                height:250px;"></div>
                                    
                                    <div class="card-body">
                                        <a href="<?php echo base_url($berita['judul_seo']);?>">                                          
                                            <h5 class="news-title">
                                                <?php echo $berita['judul'];?>
                                            </h5>
                                        </a>
                                        <div class="news-meta">   
                                            <i class="fa fa-calendar"></i> <?php echo tgl_indo($berita['tanggal']); ?> ,
                                            <i class="fa fa-user"></i> <?php echo $berita['nama_lengkap']; ?>,
                                            <a href="<?php echo base_url()."kategori/detail/".$berita['kategori_seo']; ?>">
                                                <b><?php echo $berita['nama_kategori']; ?></b>
                                            </a>
                                            
                                        </div> 
                                        <div class="news-content">
                                            <?php echo strip_tags(word_limiter($berita['isi_berita'],10) );?> 
                                        </div>
                                        <div class="news-link">
                                        <a href="<?php echo base_url($berita['judul_seo']);?>" class="read-more">
                                            Selengkapnya
                                        </a>
                                        </div>
                                    </div>
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
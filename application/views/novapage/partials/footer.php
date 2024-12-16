<?php
//menampilkan identias website 
$id_website = $this->model_utama->view('identitas')->row_array();	
$logo_website = $this->model_utama->view('logo')->row_array();			

// footer menu 
$get_lokasi_menu    = $this->model_utama->view_where('tbl_novapage',array('key' => 'lokasi_menu'))->row_array();
if(isset($get_lokasi_menu['value'])){
	if(!empty($get_lokasi_menu['value'])){
		$lokasi_menu = json_decode($get_lokasi_menu['value'],true);
	}
} 
$menu_footer_id = '';
if(isset($lokasi_menu['menu_footer'])) {
	$menu_footer_id = $lokasi_menu['menu_footer'];
}


function build_footer_menu($menu_parent_id ){
	// get instance CI
	$list_menu = '';
	$ci = & get_instance();
	$get_menus = $ci->db->query("
		SELECT 
			id_menu, 
			nama_menu, 
			link
		FROM 
			menu 
		WHERE 
			aktif='Ya' 
			AND 
			id_parent='". $menu_parent_id."'
		ORDER BY urutan
	")->result_array();
	if(!empty($get_menus)) {  
		$list_menu .= '<ul class="footer-menu">';  
		foreach($get_menus as $menu_item) {	  
			// filter http link
			$ahref_ttr ='';
			$base_url = base_url($menu_item['link']);
			if(preg_match("/^http/", $menu_item['link'])) {
				$ahref_ttr = 'target="_BLANK"';
				$base_url = $menu_item['link'];
			}
			// create link			
			$list_menu .= '<li class="menu-item" id="menu-item-'.$menu_item['id_menu'].'">';
			$list_menu .= '<a '. $ahref_ttr .' href="'. $base_url .'">';
			$list_menu .= $menu_item['nama_menu'];
			$list_menu .= '</a>'; 
			$list_menu .= '</li>'; 
		}
		$list_menu .= '</ul>';
	}
	return $list_menu;
}


$base_path = FCPATH;
?>
<footer>
	<div id="footer" class="py-5">  
		<div class="container footer-widget">		
			<?php include 'footer_widget.php'; ?>
		</div>  
	</div>
	<div id="footer-bottom" class="py-4">
		<div class="container">  
			<div class="row">
				<div class="col-12 col-lg-6 col-pt-10 text-lg-left text-center">
					<div class="d-inline-block d-lg-inline">
						&copy; <?php echo date('Y');?> Copyright <b><?php echo $id_website['nama_website']; ?></b> 
						<?php 
						if( isset($tagline['footer']) && isset($tagline['text'])) {
							if(!empty($tagline['text'] && $tagline['footer'] ==  '1') ){
								?>
								- <?php echo $tagline['text'];?> 
								<?php
							}
						}?>
					</div>
					<div class="d-inline-block d-lg-inline">
						made with 💙 by iegcode
					</div>
				</div>
				<div class="col-12 col-lg-6 text-center text-lg-right">  
					<?php 
						echo build_footer_menu($menu_footer_id);
					?> 
				</div>
			</div>
		</div>
	</div>
</footer>
<?php $this->model_utama->kunjungan(); ?>
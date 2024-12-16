<?php

$get_sections    = $this->model_utama->view_where('tbl_novapage',array('key' => 'sections_order'))->row_array();
if(isset($get_sections['value'])){
	if(!empty($get_sections['value'])){
		$sections = json_decode($get_sections['value'],true);
	}
}

$number = 1;
foreach($sections as $item) {
	$file_section = VIEWPATH .'novapage/sections/' . $item . '.php';
	if( file_exists($file_section)) {
        ?> 
        <?php
            include $file_section;
        ?> 
        <?php
        $number++;
    }
}
?>  
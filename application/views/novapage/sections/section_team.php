<?php 
$get_section_team    = $this->model_utama->view_where('tbl_novapage',array('key' => 'section_team'))->row_array();
if(isset($get_section_team['value'])){
	if(!empty($get_section_team['value'])){
		$section_team = json_decode($get_section_team['value'],true);
	}
}

// koleksi id team
$get_personal_id = array(); 
if(isset($section_team['item'])) {
    if(!empty($section_team['item'])) { 
        foreach($section_team['item'] as $team){
            array_push($get_personal_id,$team['team_id']);
        }
    }
}
// get personal
$get_personal = array();
if(!empty($get_personal_id)) {
    $get_personal = $this->db->query("
                SELECT 
                    team.id_team as id,
                    team.nama as nama,
                    team.jabatan as jabatan,
                    team.socmed_fb as socmed_fb,
                    team.socmed_twitter as socmed_twitter,
                    team.socmed_ig as socmed_ig,
                    team.socmed_linkedin as socmed_linkedin,
                    team.photo as photo
                FROM 
                    tbl_novapage_team as team
                WHERE
                    team.id_team IN(". implode(',',$get_personal_id) .") 
                ORDER BY FIELD(team.id_team,". implode(',',$get_personal_id) .") 
            ")->result_array(); 
} 
?>

<div id="<?php echo $item ;?>" class="section section-team">
<?php 
    $skema_warna = 'default';
    switch ($section_team['skema_warna']) {
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
                <?php if( !empty($section_team['judul'])) { ?>
                <h2 class="card-header section-title">
                    <?php echo strtoupper($section_team['judul']);?>
                </h2>
                <?php } ?>
                <?php if( !empty($section_team['deskripsi'])) { ?>
                <div class="section-description">
                    <?php echo $section_team['deskripsi'];?>
                </div>
                <?php } ?> 
                <div class="card-body">
                    <div class="row justify-content-center">
                        <?php if( !empty($get_personal)) {?>
                            <?php
                                switch ((int) $section_team['layout']) { 
                                    case 2:
                                        $layout = '6'; 
                                        break;                                    
                                    case 3:
                                        $layout = '4'; 
                                        break;                                    
                                    case 4:
                                        $layout = '3'; 
                                        break;                          
                                    default:                             
                                        $layout = '6'; 
                                        break;
                                }
                            ?>
                            <?php foreach($get_personal as $person) {?>
                            <div class="mb-4 col-md-6 col-lg-<?php echo $layout;?> col-py-10">
                                <div class="card card-border h-100 card-team"> 
                                    <img width="100%" src="<?php echo base_url();?>asset/img_novapage/team/<?php echo $person['photo'];?>" alt="<?php echo $person['nama'];?>">                                            
                                    
                                    <div class="card-body team-description">
                                        <h4 class="team-name">
                                            <?php echo $person['nama'];?>
                                        </h4>
                                        <div class="team-title">
                                            <?php echo $person['jabatan'];?>
                                        </div>
                                        <!-- <div class="team-socmed">
                                            <a target="_blank" href="<?php echo $person['socmed_fb'];?>">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                            <a target="_blank" href="<?php echo $person['socmed_twitter'];?>">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                            
                                            <a target="_blank" href="<?php echo $person['socmed_ig'];?>">
                                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                            
                                            <a target="_blank" href="<?php echo $person['socmed_linkedin'];?>">
                                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                                            </a>
                                        </div> -->
                                    </div>                             
                                </div>
                            </div>                    
                            <?php }?>
                            <div class="col-12 text-center">
                                <a href="<?php echo base_url('teams');?>" class="read-more">                                    
                                    <?php echo (empty(trim($section_team['label_link'])) ? 'Selengkapnya' : $section_team['label_link']);?>
                                </a> 
                            </div>   
                        <?php }?>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div> 
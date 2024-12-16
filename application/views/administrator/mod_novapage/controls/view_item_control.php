<div id="text-icon-gambar-template" style="display:none"> 
    <?php 
        novapage_item_text_icon( 
            '',
            '', 
            $get_halaman_seo_dropdown
        );
    ?>
</div>
<div id="text-gambar-template" style="display:none"> 
    <?php 
        novapage_item_text_gambar( 
            '',
            '', 
            $get_halaman_seo_dropdown
        );
    ?>
</div> 
<div id="faqs-template" style="display:none"> 
    <?php 
        novapage_item_faqs();
    ?>
</div>
<div id="team-template" style="display:none"> 
    <?php 
        novapage_item_team(
            '',
            '', 
            $get_team_dropdown
        );
    ?>
</div>
<div id="skill-meter-template" style="display:none"> 
    <?php 
        novapage_item_skill();
    ?>
</div> 
<?php 
function novapage_item_text_icon(
        $i = '', 
        $value_item = '', 
        $dropdown_halaman = array(),
        $param_name = 'setting_sections'
    ) {
    ?>
    <div class="card collapsed-card text-info-item item">
        <div class="card-header bg-secondary">
            <div class="card-title"> 
                #<span class="number"><?php echo ($i + 1);?></span> 
                <span class="item-title">
                    <?php echo word_limiter( (!empty($value_item['judul']) ? $value_item['judul'] : 'Item') ,5);?>
                </span>
            </div>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                </button>
                <button type="button" class="btn-remove btn btn-tool ">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        </div>
        <div class="card-body"> 
            <div class="form-group">
                <label>Judul</label>
                <input  
                    data-name="judul" 
                    data-item="Y" 
                    name="<?php echo $param_name; ?>[item][<?php echo $i;?>][judul]"
                    value="<?php echo $value_item['judul'];?>"
                    type="text"placeholder="Judul" class="form-control item-judul">
            </div> 
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea rows="5"  
                    data-name="deskripsi" 
                    data-item="Y" class="form-control"                    
                    name="<?php echo $param_name; ?>[item][<?php echo $i;?>][deskripsi]"
                    ><?php echo $value_item['deskripsi'];?></textarea> 
            </div>  
            <div class="form-group item-icon">
                <div class="icon-container btn-icon">
                    <?php if(!empty($value_item['icon'])){ ?>
                        <i class="<?php echo $value_item['icon'];?>"></i>
                    <?php } else { ?>
                        <label>Pilih Icon</label>
                    <?php } ?>
                </div>
                <input  
                    data-name="icon" 
                    data-item="Y" 
                    name="<?php echo $param_name; ?>[item][<?php echo $i;?>][icon]"
                    value="<?php echo $value_item['icon'];?>"
                    type="hidden" class="item-icon-text">
                <a class="btn-icon-clear" href="#">Hapus Icon</a>
            </div>   
            <div class="form-group">                              
                <label>Link Ke Halaman</label>
                <select 
                    data-name="link_halaman" 
                    data-item="Y"  class="form-control"
                    name="<?php echo $param_name; ?>[item][<?php echo $i;?>][link_halaman]"
                    > 
                    <option value="" <?php echo ($value_item['link_halaman'] ==  '') ? 'selected="selected"' : '';?>>-- Pilih Halaman --</option>
                    <?php if(!empty($dropdown_halaman)){
                        foreach($dropdown_halaman as $halaman){ 
                            ?>
                            <option value="<?php echo $halaman['id'];?>"                            
                                <?php echo ($value_item['link_halaman'] ==  $halaman['id']) ? 'selected="selected"' : '';?>
                                >
                                <?php echo $halaman['judul'];?>
                            </option>
                            <?php
                        }
                    }?>
                </select> 
            </div> 
        </div>
    </div> 
    <?php
}
 
function novapage_item_text_gambar(
        $i = '', 
        $value_item = '', 
        $dropdown_halaman = array(),
        $param_name = 'setting_sections'
    ) { 
    ?>
    <div class="card collapsed-card text-info-item item">
        <div class="card-header bg-secondary">
            <div class="card-title"> 
                #<span class="number"><?php echo ($i + 1);?></span> 
                <span class="item-title">
                    <?php echo  word_limiter((!empty($value_item['judul']) ? $value_item['judul'] : 'Item'),5) ;?>
                </span>
            </div>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                </button>
                <button type="button" class="btn-remove btn btn-tool ">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        </div>
        <div class="card-body"> 
            <div class="form-group">
                <label>Judul</label>
                <input  
                    data-name="judul" 
                    data-item="Y" 
                    name="<?php echo $param_name; ?>[item][<?php echo $i;?>][judul]"
                    value="<?php echo $value_item['judul'];?>"
                    type="text"placeholder="Judul" class="form-control item-judul">
            </div> 
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea rows="5"  
                    data-name="deskripsi" 
                    data-item="Y" class="form-control"                    
                    name="<?php echo $param_name; ?>[item][<?php echo $i;?>][deskripsi]"
                    ><?php echo $value_item['deskripsi'];?></textarea> 
            </div>   
            <div class="form-group item-image">
                <div class="image-container btn-image">
                    <?php if(!empty($value_item['gambar'])){ ?>
                        <img src="<?php echo base_url('asset/img_novapage/images/'.$value_item['gambar']);?>" /> 
                    <?php } else { ?>
                        <label>Pilih Gambar</label>
                    <?php } ?>
                </div>
                <input  
                    data-name="gambar" 
                    data-item="Y" 
                    name="<?php echo $param_name; ?>[item][<?php echo $i;?>][gambar]"
                    value="<?php echo $value_item['gambar'];?>"
                    type="hidden" class="item-image-text">
                <a class="btn-image-clear" href="#">Hapus Gambar</a>
            </div>   
            <div class="form-group select-link">
                <label>
                   Tipe Link
                </label>
                    <?php
                        if(isset($value_item['tipe_link'])) {
                            $value_item['tipe_link'] = ( empty($value_item['tipe_link']) ? 'halaman' : $value_item['tipe_link']);
                        } else {
                            $value_item['tipe_link'] = '';
                        }
                    ?>
                    <select 
                        data-name="tipe_link" 
                        data-item="Y" 
                        name="<?php echo $param_name; ?>[item][<?php echo $i;?>][tipe_link]" 
                        class="select-link-type form-control">
                        <option value="halaman" <?php echo ($value_item['tipe_link']  == 'halaman' ? 'selected="selected"' : '');?>>Halaman</option>
                        <option value="url" <?php echo ($value_item['tipe_link']  == 'url' ? 'selected="selected"' : '');?>>Url</option>
                    </select>
                    <div class="halaman py-2" <?php echo ($value_item['tipe_link'] =='halaman' ? '' : 'style="display:none"');?> >
                
                    <select 
                        data-name="link_halaman" 
                        data-item="Y"  
                        class="form-control"
                        name="<?php echo $param_name; ?>[item][<?php echo $i;?>][link_halaman]"
                        > 
                        <option value="" <?php echo ($value_item['link_halaman'] ==  '') ? 'selected="selected"' : '';?>>-- Pilih Halaman --</option>
                        <?php if(!empty($dropdown_halaman)){
                            foreach($dropdown_halaman as $halaman){ 
                                ?>
                                <option value="<?php echo $halaman['id'];?>"                            
                                    <?php echo ($value_item['link_halaman'] ==  $halaman['id']) ? 'selected="selected"' : '';?>
                                    >
                                    <?php echo $halaman['judul'];?>
                                </option>
                                <?php
                            }
                        }?>
                    </select> 

                </div>
                <div class="url py-2" <?php echo ($value_item['tipe_link']==='url' ? '' : 'style="display:none"');?> >
                    <input 
                        data-name="link_url" 
                        data-item="Y"  
                        placeholder="url" 
                        type="text" 
                        class="form-control" 
                        name="<?php echo $param_name; ?>[item][<?php echo $i;?>][link_url]"  
                        value="<?php echo $value_item['link_url'];?>"> 
                </div>
            </div> 
            <div class="form-group">
                <label>
                    Link Label
                </label> 
                <input 
                    data-name="link_label" 
                    data-item="Y"  
                    placeholder="Selengkapnya" 
                    type="text" 
                    class="form-control form-input-text" 
                    name="<?php echo $param_name; ?>[item][<?php echo $i;?>][link_label]"
                    value="<?php echo $value_item['link_label'];?>"> 
            </div>  
        </div>
    </div> 
    <?php
}

function novapage_item_halaman_info(
    $i = '', 
    $value_item = '',
    $dropdown_halaman = array(),
    $param_name = 'setting_sections'
) { 
?>
<div class="card collapsed-card text-info-item item">
    <div class="card-header bg-secondary">
        <div class="card-title"> 
            #<span class="number"><?php echo ($i + 1);?></span> 
            <span class="item-title">
                <?php echo  word_limiter((!empty($value_item['judul']) ? $value_item['judul'] : 'Item'),5) ;?>
            </span>
        </div>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
            </button>
            <button type="button" class="btn-remove btn btn-tool ">
                <i class="fas fa-trash-alt"></i>
            </button>
        </div>
    </div>
    <div class="card-body">  
        <div class="form-group">                              
            <label>Pilih Halaman</label>            
            <input  
                data-name="judul" 
                data-item="Y" 
                name="<?php echo $param_name; ?>[item][<?php echo $i;?>][judul]"
                value="<?php echo $value_item['judul'];?>"
                type="hidden"placeholder="Judul" class="form-control item-judul">
            <select 
                data-name="halaman_id" 
                data-item="Y"  class="form-control select-item"
                name="<?php echo $param_name; ?>[item][<?php echo $i;?>][halaman_id]"
                > 
                <option value="" <?php echo ($value_item['halaman_id'] ==  '') ? 'selected="selected"' : '';?>>-- Pilih Halaman --</option>
                <?php if(!empty($dropdown_halaman)){
                    foreach($dropdown_halaman as $halaman){ 
                        ?>
                        <option value="<?php echo $halaman['id'];?>"                            
                            <?php echo ($value_item['halaman_id'] ==  $halaman['id']) ? 'selected="selected"' : '';?>
                            >
                            <?php echo $halaman['judul'];?>
                        </option>
                        <?php
                    }
                }?>
            </select> 
        </div> 
    </div>
</div> 
<?php
}
 

function novapage_item_faqs(
    $i = '', 
    $value_item = '', 
    $param_name = 'setting_sections'
) {
?>
<div class="card collapsed-card text-info-item item">
    <div class="card-header bg-secondary">
        <div class="card-title"> 
            #<span class="number"><?php echo ($i + 1);?></span> 
            <span class="item-title">
                <?php echo  word_limiter((!empty($value_item['tanya']) ? $value_item['tanya'] : 'Item') ,5);?>
            </span>
        </div>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
            </button>
            <button type="button" class="btn-remove btn btn-tool ">
                <i class="fas fa-trash-alt"></i>
            </button>
        </div>
    </div>
    <div class="card-body"> 
        <div class="form-group">
            <label>Pertanyaan</label>
            <input  
                data-name="tanya" 
                data-item="Y" 
                name="<?php echo $param_name; ?>[item][<?php echo $i;?>][tanya]"
                value="<?php echo $value_item['tanya'];?>"
                type="text" placeholder="Pertanyaan" class="form-control item-judul">
        </div> 
        <div class="form-group">
            <label>Jawaban</label>
            <textarea rows="5"  
                data-name="jawaban" 
                data-item="Y" class="form-control"                    
                name="<?php echo $param_name; ?>[item][<?php echo $i;?>][jawaban]"
                ><?php echo $value_item['jawaban'];?></textarea> 
        </div> 
    </div>
</div> 
<?php
}




function novapage_item_team(
    $i = '', 
    $value_item = '',
    $dropdown_team = array(),
    $param_name = 'setting_sections'
) {
?>
<div class="card collapsed-card text-info-item item">
    <div class="card-header bg-secondary">
        <div class="card-title"> 
            #<span class="number"><?php echo ($i + 1);?></span> 
            <span class="item-title">
                <?php echo  word_limiter((!empty($value_item['name']) ? $value_item['name'] : 'Item') ,5);?>
            </span>
        </div>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
            </button>
            <button type="button" class="btn-remove btn btn-tool ">
                <i class="fas fa-trash-alt"></i>
            </button>
        </div>
    </div>
    <div class="card-body">  
        <div class="form-group">                              
            <label>Pilih Personal Team</label>            
            <input  
                data-name="name" 
                data-item="Y" 
                name="<?php echo $param_name; ?>[item][<?php echo $i;?>][name]"
                value="<?php echo $value_item['name'];?>"
                type="hidden" placeholder="Judul" class="form-control item-judul">
            <select 
                data-name="team_id" 
                data-item="Y"  class="form-control select-item"
                name="<?php echo $param_name; ?>[item][<?php echo $i;?>][team_id]"
                > 
                <option value="" <?php echo ($value_item['team_id'] ==  '') ? 'selected="selected"' : '';?>>-- Pilih Personal Team --</option>
                <?php if(!empty($dropdown_team)){
                    foreach($dropdown_team as $team){ 
                        ?>
                        <option value="<?php echo $team['id'];?>"                            
                            <?php echo ($value_item['team_id'] ==  $team['id']) ? 'selected="selected"' : '';?>
                            >
                            <?php echo $team['nama'];?>
                        </option>
                        <?php
                    }
                }?>
            </select> 
        </div> 
    </div>
</div> 
<?php
}


function novapage_item_skill(
    $i = '',
    $index_section = '',
    $type = '',
    $value_item = '', 
    $param_name = 'setting_sections'
) {
?>
<div class="card collapsed-card text-info-item item">
    <div class="card-header bg-secondary">
        <div class="card-title"> 
            #<span class="number"><?php echo ($i + 1);?></span> 
            <span class="item-title">
                <?php echo (!empty($value_item['skill']) ? $value_item['skill'] : 'Item') ;?>
            </span>
        </div>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
            </button>
            <button type="button" class="btn-remove btn btn-tool ">
                <i class="fas fa-trash-alt"></i>
            </button>
        </div>
    </div>
    <div class="card-body"> 
        <div class="form-group">
            <label>Keahlian</label>
            <input  
                data-name="skill" 
                data-item="Y" 
                name="<?php echo $param_name; ?>[item][<?php echo $i;?>][skill]"
                value="<?php echo $value_item['skill'];?>"
                type="text" placeholder="Keahlian" class="form-control item-judul" >
        </div> 
        <div class="form-group">
            <label>Persentase</label>
            <input rows="5"  
                data-name="percent" 
                data-item="Y" class="form-control"                    
                name="<?php echo $param_name; ?>[item][<?php echo $i;?>][percent]"
                type="range"
                min="10"
                max="100"
                step="5"
                value="<?php echo $value_item['percent'];?>" > 
        </div> 
    </div>
</div> 
<?php
}


?>
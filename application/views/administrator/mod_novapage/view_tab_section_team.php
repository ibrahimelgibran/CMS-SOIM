<?php echo form_open($this->uri->segment(1)."/novapage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_section_team = isset($get_section_team) ? $get_section_team : array(); 
        $get_team_dropdown = isset($get_team_dropdown) ? $get_team_dropdown : array();  
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info"> 
            <h3 class="card-title py-1">
                Section Team
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="form-group">
                        <label>
                            Judul
                        </label>
                        <input type="text" class="form-control" name="section_team[judul]"  value="<?php echo $get_section_team['judul'];?>">
                    </div>
                    <div class="form-group">
                        <label>
                            Deskripsi
                        </label>
                        <textarea  name="section_team[deskripsi]" rows="5" class="form-control"><?php echo $get_section_team['deskripsi'];?></textarea>
                    </div>
                    <div class="form-group repeatable-control">
                        <div class="text-info-container">
                            <div class="dd-item-container"  id="item-section" data-type="section_team">
                                <ol class="dd-list list-item-section">
                                <?php 
                                    if( isset($get_section_team['item'])) {
                                        if( !empty( $get_section_team['item'] )) {
                                            ?>
                                                <?php
                                                    foreach($get_section_team['item'] as $i => $value_item) {
                                                        ?>
                                                        <li class="dd-item item-section" > 
                                                            <div class="dd-handle">
                                                                <i class="fa fa-arrows-alt"></i>
                                                            </div>
                                                        <?php
                                                        novapage_item_team(
                                                            $i, 
                                                            $value_item, 
                                                            $get_team_dropdown,
                                                            'section_team'
                                                        );
                                                        ?>
                                                        </li>
                                                <?php
                                                    }
                                                ?>
                                            <?php
                                        }
                                    }
                                ?>
                                </ol>
                            </div>   
                        </div>
                        <button type="button"
                            data-template="team-template" 
                            data-type="section_team"  
                            class="btn-add-item btn btn-default btn-sm text-info-add mb-2"
                            >
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Team
                        </button>
                    </div>   
                    <div class="form-group">
                        <label>
                            Layout
                        </label>                        
                        <select name="section_team[layout]" class="form-control"> 
                            <option value="2" <?php echo ($get_section_team['layout'] == '2') ? 'selected="selected"' : '';?>>2 Kolom</option>
                            <option value="3" <?php echo ($get_section_team['layout'] == '3') ? 'selected="selected"' : '';?>>3 Kolom</option> 
                            <option value="4" <?php echo ($get_section_team['layout'] == '4') ? 'selected="selected"' : '';?>>4 Kolom</option> 
                        </select>
                    </div>
                    <div class="form-group">
                        <label>
                            Link Label
                        </label>
                        <input placeholder="Selengkapnya" type="text" class="form-control form-input-text" 
                                name="section_team[label_link]"  value="<?php echo $get_section_team['label_link'];?>">
                    </div>
                    <div class="form-group">
                        <label>
                            Skema Warna
                        </label>                             
                        <select name="section_team[skema_warna]" class="form-control select-color-schema">
                            <option <?php echo ($get_section_team['skema_warna'] =='' ? 'selected="selected"' : '');?> value="">-- Pilih Skema Warna --</option>
                            <option <?php echo ($get_section_team['skema_warna'] =='default' ? 'selected="selected"' : '');?> value="default">Default</option>
                            <option <?php echo ($get_section_team['skema_warna'] =='light' ? 'selected="selected"' : '');?> value="light">Light</option> 
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_team">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan Judul / Deskripsi Team.</li>  
        <li>klik tombol "Tambah Team" untuk memilih personal team yang akan ditampilkan di web .</li> 
        <li>Pilih "Layout" yang sesuai.</li> 
        <li>"Link Label" untuk memberi nama link tautan ke halaman team.</li>
        <li>"Skema Warna" untuk menentukan warna background.</li>
    </ul>
</div>
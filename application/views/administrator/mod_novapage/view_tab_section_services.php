<?php echo form_open($this->uri->segment(1)."/novapage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_section_services = isset($get_section_services) ? $get_section_services : array(); 
        $get_halaman_seo_dropdown = isset($get_halaman_seo_dropdown) ? $get_halaman_seo_dropdown : array();     
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Section Services
            </h3>
        </div>
        <div class="card-body section-control">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="form-group">
                        <label>
                            Judul
                        </label>
                        <input type="text" class="form-control" name="section_services[judul]"  value="<?php echo $get_section_services['judul'];?>">
                    </div>
                    <div class="form-group">
                        <label>
                            Deskripsi
                        </label>
                        <textarea  name="section_services[deskripsi]" rows="5" class="form-control"><?php echo $get_section_services['deskripsi'];?></textarea>
                    </div>
            

                    <div class="form-group repeatable-control">
                        <div class="text-info-container">
                            <div class="dd-item-container"  id="item-section" data-type="section_services">
                                <ol class="dd-list list-item-section">
                                <?php 
                                    if( isset($get_section_services['item'])) {
                                        if( !empty( $get_section_services['item'] )) {
                                            ?>
                                                <?php
                                                    foreach($get_section_services['item'] as $i => $value_item) {
                                                        ?>
                                                        <li class="dd-item item-section" > 
                                                            <div class="dd-handle">
                                                                <i class="fa fa-arrows-alt"></i>
                                                            </div>
                                                        <?php
                                                        novapage_item_text_icon(
                                                            $i, 
                                                            $value_item, 
                                                            $get_halaman_seo_dropdown,
                                                            'section_services'
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
                            data-template="text-icon-gambar-template" 
                            data-type="section_services"  
                            class="btn-add-item btn btn-default btn-sm text-info-add mb-2"
                            >
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Item Service
                        </button>
                    </div>   
                            
                    <div class="form-group">
                        <label>
                            Skema Warna
                        </label>                             
                            <select name="section_services[skema_warna]" class="form-control select-color-schema">
                                <option <?php echo ($get_section_services['skema_warna'] =='' ? 'selected="selected"' : '');?> value="">-- Pilih Skema Warna --</option>
                                <option <?php echo ($get_section_services['skema_warna'] =='default' ? 'selected="selected"' : '');?> value="default">Default</option>
                                <option <?php echo ($get_section_services['skema_warna'] =='light' ? 'selected="selected"' : '');?> value="light">Light</option> 
                            </select>
                    </div>   
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_services">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan Judul / Deskripsi Services.</li>
        <li>klik tombol "Tambah Item Services" untuk Membuat Content Services .</li> 
        <li>"Skema Warna" untuk menentukan warna background.</li>
        <li>"Gambar Background (optional)" untuk menentukan gambar background jika memilih skema warna (Dark + Gambar Background).</li>
    </ul>
</div>
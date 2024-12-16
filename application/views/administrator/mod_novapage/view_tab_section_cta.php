<?php echo form_open($this->uri->segment(1)."/novapage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_section_cta = isset($get_section_cta) ? $get_section_cta : array();  
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Section Call To Action
            </h3>
        </div>
        <div class="card-body section-control">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="form-group">
                        <label>
                            Teks
                        </label>
                        <textarea  name="section_cta[text]" rows="5" class="form-control"><?php echo $get_section_cta['text'];?></textarea>
                    </div>  
                    <div class="form-group">
                        <label>
                            Link Url
                        </label>
                        <input placeholder="Url" type="text" class="form-control" name="section_cta[url]"  value="<?php echo $get_section_cta['url'];?>">
                    </div>
                    <div class="form-group">
                        <label>
                            Link Label
                        </label>
                        <input placeholder="Join Now" type="text" class="form-control form-input-text" name="section_cta[label]"  value="<?php echo $get_section_cta['label'];?>">
                    </div>
 
                    <div class="form-group">
                        <label>
                            Skema Warna
                        </label>                             
                            <select name="section_cta[skema_warna]" class="form-control select-color-schema">
                                <option <?php echo ($get_section_cta['skema_warna'] =='' ? 'selected="selected"' : '');?> value="">-- Pilih Skema Warna --</option>
                                <option <?php echo ($get_section_cta['skema_warna'] =='default' ? 'selected="selected"' : '');?> value="default">Default</option>
                                <option <?php echo ($get_section_cta['skema_warna'] =='light' ? 'selected="selected"' : '');?> value="light">Light</option>
                                <option <?php echo ($get_section_cta['skema_warna'] =='dark' ? 'selected="selected"' : '');?> value="dark">Dark</option>
                                <option <?php echo ($get_section_cta['skema_warna'] =='image' ? 'selected="selected"' : '');?> value="image">Dark + Gambar Background</option>
                            </select>
                    </div> 

                    <div class="form-group item-image">
                        <label>Gambar Background (optional)</label>
                        <div class="image-container btn-image">
                            <?php if(!empty( $get_section_cta['background'])){ ?>
                                <img src="<?php echo base_url('asset/img_novapage/images/'. $get_section_cta['background']);?>" /> 
                            <?php } else { ?>
                                <label>Pilih Gambar</label>
                            <?php } ?>
                        </div>
                        <input   
                            name="section_cta[background]"
                            value="<?php echo $get_section_cta['background'];?>"
                            type="hidden" class="item-image-text">
                        <a class="btn-image-clear" href="#">Hapus Gambar</a>
                    </div> 
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_cta">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan "Teks" yang diperlukan untuk "Call To Action".</li> 
        <li>"Link Url" untuk memberi link tautan ke info "Call To Action".</li>
        <li>"Link Label" untuk memberi nama link tautan ke halaman yang berkaitan .</li>
        <li>"Skema Warna" untuk menentukan warna background.</li>
        <li>"Gambar Background (optional)" untuk menentukan gambar background jika memilih skema warna (Dark + Gambar Background).</li>
    </ul>
</div>
<?php echo form_open($this->uri->segment(1)."/novapage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_section_testimonial = isset($get_section_testimonial) ? $get_section_testimonial : array();  
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info"> 
            <h3 class="card-title py-1">
                Section Testimonial
            </h3>
        </div>
        <div class="card-body section-control">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="form-group">
                        <label>
                            Judul
                        </label>
                        <input type="text" class="form-control" name="section_testimonial[judul]"  value="<?php echo $get_section_testimonial['judul'];?>">
                    </div>
                    <div class="form-group">
                        <label>
                            Deskripsi
                        </label>
                        <textarea  name="section_testimonial[deskripsi]" rows="5" class="form-control"><?php echo $get_section_testimonial['deskripsi'];?></textarea>
                    </div> 
                    <div class="form-group">
                        <label>
                            Jumlah Testimoni Yang Tampil
                        </label>
                        <select name="section_testimonial[jumlah]" class="form-control form-select">
                            <?php
                            for($n = 1; $n <=10 ; $n++){ 
                                ?>
                                <option value="<?php echo $n;?>" 
                                    <?php echo ($get_section_testimonial['jumlah'] == $n) ? 'selected="selected"' : '';?>>
                                    <?php echo $n;?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label>
                            Skema Warna
                        </label>                   
                            <select name="section_testimonial[skema_warna]" class="form-control select-color-schema">
                                <option <?php echo ($get_section_testimonial['skema_warna'] =='' ? 'selected="selected"' : '');?> value="">-- Pilih Skema Warna --</option>
                                <option <?php echo ($get_section_testimonial['skema_warna'] =='default' ? 'selected="selected"' : '');?> value="default">Default</option>
                                <option <?php echo ($get_section_testimonial['skema_warna'] =='light' ? 'selected="selected"' : '');?> value="light">Light</option>
                                <option <?php echo ($get_section_testimonial['skema_warna'] =='dark' ? 'selected="selected"' : '');?> value="dark">Dark</option>
                                <option <?php echo ($get_section_testimonial['skema_warna'] =='image' ? 'selected="selected"' : '');?> value="image">Dark + Gambar Background</option>
                            </select>
                    </div> 
                    <div class="form-group item-image">
                        <label>Gambar Background (optional)</label>
                        <div class="image-container btn-image">
                            <?php if(!empty( $get_section_testimonial['background'])){ ?>
                                <img src="<?php echo base_url('asset/img_novapage/images/'. $get_section_testimonial['background']);?>" /> 
                            <?php } else { ?>
                                <label>Pilih Gambar</label>
                            <?php } ?>
                        </div>
                        <input  
                            data-name="background"  
                            name="section_testimonial[background]"
                            value="<?php echo $get_section_testimonial['background'];?>"
                            type="hidden" class="item-image-text">
                        <a class="btn-image-clear" href="#">Hapus Gambar</a>
                    </div> 
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_testimonial">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan Judul / Deskripsi Testimonial.</li>  
        <li>Batasi testimonial yang ditampilkan dengan mengisi "Jumlah Testimoni Yang Tampil".</li> 
        <li>"Skema Warna" untuk menentukan warna background.</li>
        <li>"Gambar Background (optional)" untuk menentukan gambar background jika memilih skema warna (Dark + Gambar Background).</li>
    </ul>
</div>
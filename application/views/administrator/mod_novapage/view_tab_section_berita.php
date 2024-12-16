<?php echo form_open($this->uri->segment(1)."/novapage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_section_berita = isset($get_section_berita) ? $get_section_berita : array(); 
        $get_kategori_dropdown = isset($get_kategori_dropdown) ? $get_kategori_dropdown : array();
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Section Berita
            </h3>
        </div>
        <div class="card-body section-control">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="form-group">
                        <label>
                            Judul
                        </label>
                        <input type="text" class="form-control" name="section_berita[judul]"  value="<?php echo $get_section_berita['judul'];?>">
                    </div>
                    <div class="form-group">
                        <label>
                            Deskripsi
                        </label>
                        <textarea  name="section_berita[deskripsi]" rows="5" class="form-control"><?php echo $get_section_berita['deskripsi'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label>
                            Kategori
                        </label>                
                        <select name="section_berita[kategori]" class="form-control form-select">
                            <option value="" <?php echo (empty($get_section_berita['kategori'])) ? 'selected="selected"' : '';?>>-- Semua --</option>
                            <?php if(!empty($get_kategori_dropdown)){
                                foreach($get_kategori_dropdown as $kategori){ 
                                    ?>
                                    <option value="<?php echo $kategori['id'];?>" 
                                        <?php echo ($get_section_berita['kategori'] ==  $kategori['id']) ? 'selected="selected"' : '';?>>
                                        <?php echo $kategori['judul'];?>
                                    </option>
                                    <?php
                                }
                            }?>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label>
                            Jumlah Berita Yang Tampil
                        </label>
                        <select name="section_berita[jumlah]" class="form-control form-select">
                            <?php
                            for($n = 1; $n <=6 ; $n++){ 
                                ?>
                                <option value="<?php echo $n;?>" 
                                    <?php echo ($get_section_berita['jumlah'] == $n) ? 'selected="selected"' : '';?>>
                                    <?php echo $n;?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>
                            Layout
                        </label> 
                            <select name="section_berita[layout]" class="form-control form-select"> 
                                <option value="2" <?php echo ($get_section_berita['layout'] == '2') ? 'selected="selected"' : '';?>>2 Kolom</option>
                                <option value="3" <?php echo ($get_section_berita['layout'] == '3') ? 'selected="selected"' : '';?>>3 Kolom</option>
                            </select> 
                    </div> 
                    <div class="form-group">
                        <label>
                            Skema Warna
                        </label>                             
                            <select name="section_berita[skema_warna]" class="form-control select-color-schema">
                                <option <?php echo ($get_section_berita['skema_warna'] =='' ? 'selected="selected"' : '');?> value="">-- Pilih Skema Warna --</option>
                                <option <?php echo ($get_section_berita['skema_warna'] =='default' ? 'selected="selected"' : '');?> value="default">Default</option>
                                <option <?php echo ($get_section_berita['skema_warna'] =='light' ? 'selected="selected"' : '');?> value="light">Light</option> 
                            </select>
                    </div> 
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_berita">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan Judul / Deskripsi Berita.</li>  
        <li>Pilih kategori berita yang akan ditampilkan</li>
        <li>Batasi berita yang ditampilkan dengan mengisi "Jumlah Berita Yang Tampil".</li> 
        <li>Pilih "Layout" yang sesuai.</li>  
        <li>"Skema Warna" untuk menentukan warna background.</li>
    </ul>
</div>
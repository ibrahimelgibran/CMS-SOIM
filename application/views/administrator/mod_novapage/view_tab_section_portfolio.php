<?php echo form_open($this->uri->segment(1)."/novapage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_section_portfolio = isset($get_section_portfolio) ? $get_section_portfolio : array();  
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Section Porfolio
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="form-group">
                        <label>
                            Judul
                        </label>
                        <input type="text" class="form-control" name="section_portfolio[judul]"  value="<?php echo $get_section_portfolio['judul'];?>">
                    </div>
                    <div class="form-group">
                        <label>
                            Deskripsi
                        </label>
                        <textarea  name="section_portfolio[deskripsi]" rows="5" class="form-control"><?php echo $get_section_portfolio['deskripsi'];?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>
                            Jumlah Yang Tampil
                        </label>
                        <select name="section_portfolio[jumlah]" class="form-control form-select">
                            <?php
                            for($n = 1; $n <=6 ; $n++){ 
                                ?>
                                <option value="<?php echo $n;?>" 
                                    <?php echo ($get_section_portfolio['jumlah'] == $n) ? 'selected="selected"' : '';?>>
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
                        <select name="section_portfolio[layout]" class="form-control form-select"> 
                            <option value="2" <?php echo ($get_section_portfolio['layout'] == '2') ? 'selected="selected"' : '';?>>2 Kolom</option>
                            <option value="3" <?php echo ($get_section_portfolio['layout'] == '3') ? 'selected="selected"' : '';?>>3 Kolom</option> 
                        </select>
                    </div> 
                    <div class="form-group">
                        <label>
                            Link Label
                        </label>
                        <input placeholder="Selengkapnya" type="text" class="form-control form-input-text" 
                                name="section_portfolio[label_link]"  value="<?php echo $get_section_portfolio['label_link'];?>">
                    </div> 
                    <div class="form-group">
                        <label>
                            Skema Warna
                        </label>                             
                        <select name="section_portfolio[skema_warna]" class="form-control select-color-schema">
                            <option <?php echo ($get_section_portfolio['skema_warna'] =='' ? 'selected="selected"' : '');?> value="">-- Pilih Skema Warna --</option>
                            <option <?php echo ($get_section_portfolio['skema_warna'] =='default' ? 'selected="selected"' : '');?> value="default">Default</option>
                            <option <?php echo ($get_section_portfolio['skema_warna'] =='light' ? 'selected="selected"' : '');?> value="light">Light</option> 
                        </select>
                    </div> 
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_portfolio">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan Judul / Deskripsi Porfolio.</li>  
        <li>Batasi portfolio yang ditampilkan dengan mengisi "Jumlah Yang Tampil".</li>
        <li>Pilih "Layout" yang sesuai.</li> 
        <li>"Link Label" untuk memberi nama link tautan ke halaman portfolio (default:"selengkapnya").</li>
        <li>"Skema Warna" untuk menentukan warna background.</li>
    </ul>
</div>
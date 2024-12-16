<?php echo form_open($this->uri->segment(1)."/novapage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_section_client = isset($get_section_client) ? $get_section_client : array();  
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Section Client
            </h3>
        </div>
        <div class="card-body section-control">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="form-group">
                        <label>
                            Judul
                        </label>
                        <input type="text" class="form-control" name="section_client[judul]"  value="<?php echo $get_section_client['judul'];?>"> 
                    </div>
                    <div class="form-group">
                        <label>
                            Deskripsi
                        </label>
                        <textarea  name="section_client[deskripsi]" rows="5" class="form-control"><?php echo $get_section_client['deskripsi'];?></textarea>
                        
                    </div> 
                    <div class="form-group">
                        <label>
                            Jumlah Logo Client Yang Tampil
                        </label>
                        <select name="section_client[jumlah]" class="form-control form-select">
                                <?php
                                for($n = 1; $n <=10 ; $n++){ 
                                    ?>
                                    <option value="<?php echo $n;?>" 
                                        <?php echo ($get_section_client['jumlah'] == $n) ? 'selected="selected"' : '';?>>
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
                            <select name="section_client[skema_warna]" class="form-control select-color-schema">
                                <option <?php echo ($get_section_client['skema_warna'] =='' ? 'selected="selected"' : '');?> value="">-- Pilih Skema Warna --</option>
                                <option <?php echo ($get_section_client['skema_warna'] =='default' ? 'selected="selected"' : '');?> value="default">Default</option>
                                <option <?php echo ($get_section_client['skema_warna'] =='light' ? 'selected="selected"' : '');?> value="light">Light</option> 
                            </select>
                    </div> 
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_client">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan Judul / Deskripsi Client.</li>  
        <li>Batasi client yang ditampilkan dengan mengisi " Jumlah Logo Client Yang Tampil".</li> 
        <li>"Skema Warna" untuk menentukan warna background.</li>
    </ul>
</div>
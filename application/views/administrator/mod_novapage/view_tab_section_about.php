<?php echo form_open($this->uri->segment(1)."/novapage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_section_about = isset($get_section_about) ? $get_section_about : array(); 
        $get_halaman_seo_dropdown = isset($get_halaman_seo_dropdown) ? $get_halaman_seo_dropdown : array();
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Section About
            </h3>
        </div>
        <div class="card-body section-control">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="form-group">
                        <label>
                            Judul
                        </label>
                        <div>
                            <input type="text" class="form-control" name="section_about[judul]"  value="<?php echo $get_section_about['judul'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>
                            Deskripsi
                        </label>
                        
                        <div>
                            <textarea id="section_about_teks" name="section_about[deskripsi]" rows="5" class="form-control"><?php echo $get_section_about['deskripsi'];?></textarea>
                        </div>
                    </div> 

                    <div class="form-group item-image">                
                        <label>
                            Gambar Ilustrasi 
                        </label>
                        
                        <div>
                            <div class="image-container btn-image">
                                <?php if(!empty( $get_section_about['gambar'])){ ?>
                                    <img src="<?php echo base_url('asset/img_novapage/images/'. $get_section_about['gambar']);?>" /> 
                                <?php } else { ?>
                                    <label>Pilih Gambar</label>
                                <?php } ?>
                            </div>
                            <input  
                                data-name="gambar"  
                                name="section_about[gambar]"
                                value="<?php echo $get_section_about['gambar'];?>"
                                type="hidden" class="item-image-text">
                            <a class="btn-image-clear" href="#">Hapus Gambar</a>
                        </div>
                    </div> 
                    <div class="form-group select-link">
                        <label>
                           Tipe Link
                        </label>
                        <?php
                            $get_section_about['tipe_link'] = ($get_section_about['tipe_link'] == '' ? 'halaman' : $get_section_about['tipe_link']);
                        ?>
                        <select name="section_about[tipe_link]" class="select-link-type form-control">                         
                            <option value="halaman" <?php echo ($get_section_about['tipe_link']  == 'halaman' ? 'selected="selected"' : '');?>>Halaman</option>
                            <option value="url" <?php echo ($get_section_about['tipe_link']  == 'url' ? 'selected="selected"' : '');?>>Url</option>
                        </select>
                        <div class="halaman py-2" <?php echo ($get_section_about['tipe_link'] =='halaman' ? '' : 'style="display:none"');?> >
                        <select class="form-control"
                            name="section_about[link_halaman]"
                            > 
                            <option value="" <?php echo ( $get_section_about['link_halaman'] ==  '') ? 'selected="selected"' : '';?>>-- Pilih Halaman --</option>
                            <?php if(!empty($get_halaman_seo_dropdown)){
                                foreach($get_halaman_seo_dropdown as $halaman){ 
                                    ?>
                                    <option value="<?php echo $halaman['id'];?>"                            
                                        <?php echo ( $get_section_about['link_halaman']  ==  $halaman['id']) ? 'selected="selected"' : '';?>
                                        >
                                        <?php echo $halaman['judul'];?>
                                    </option>
                                    <?php
                                }
                            }?>
                        </select> 
                        </div>
                        <div class="url py-2" <?php echo ($get_section_about['tipe_link']==='url' ? '' : 'style="display:none"');?> >
                            <input placeholder="url" type="text" class="form-control" 
                                name="section_about[link_url]"  value="<?php echo $get_section_about['link_url'];?>"> 
                        </div>
                    </div> 
                    <div class="form-group">
                        <label>
                            Link Label
                        </label> 
                            <input placeholder="Selengkapnya" type="text" class="form-control form-input-text" 
                                name="section_about[link_label]"  value="<?php echo $get_section_about['link_label'];?>"> 
                    </div> 
                    
                    <div class="form-group">
                        <label>
                            Skema Warna
                        </label>                             
                            <select name="section_about[skema_warna]" class="form-control select-color-schema">
                                <option <?php echo ($get_section_about['skema_warna'] =='' ? 'selected="selected"' : '');?> value="">-- Pilih Skema Warna --</option>
                                <option <?php echo ($get_section_about['skema_warna'] =='default' ? 'selected="selected"' : '');?> value="default">Default</option>
                                <option <?php echo ($get_section_about['skema_warna'] =='light' ? 'selected="selected"' : '');?> value="light">Light</option> 
                            </select>
                    </div> 
                </div>
            </div>                               
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_about">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan Judul / Deskripsi About.</li>
        <li>Pilihlah Gambar yang akan digunakan sebagai informasi About.</li>          
        <li>Tentukan Link dengan memilih Tipe Link.</li>  
        <li>"Link Label" untuk memberi nama button tautan ke halaman about.</li>
        <li>"Skema Warna" untuk menentukan warna background.</li>
    </ul>
</div>


<script>
$(function(){
  $(document).ready(function() {
     $('#section_about_teks').summernote({
       height: 400,
       toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear','height','strikethrough','subscript','superscript','size']],
          ['fontname', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']], 
          ['view', ['codeview', 'help']],
       ]
     });
  });
});
</script> 
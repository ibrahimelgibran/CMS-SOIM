<?php echo form_open($this->uri->segment(1)."/novapage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_section_contact = isset($get_section_contact) ? $get_section_contact : array();  
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Section Contact
            </h3>
        </div>
        <div class="card-body section-control">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="form-group">
                        <label>
                            Judul
                        </label>
                        <input type="text" class="form-control" name="section_contact[judul]"  value="<?php echo $get_section_contact['judul'];?>">
                    </div>
                    <div class="form-group">
                        <label>
                            Deskripsi
                        </label>
                        <textarea  name="section_contact[deskripsi]" rows="5" class="form-control"><?php echo $get_section_contact['deskripsi'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label>
                            Teks
                        </label>
                        <textarea id="section_contact_teks" name="section_contact[text]" rows="5" class="form-control"><?php echo $get_section_contact['text'];?></textarea>
                    </div> 
                    <div class="form-group">
                        <label>
                            Google Map Source
                        </label>
                        <textarea  name="section_contact[embeded_code]" rows="5" class="form-control"><?php echo $get_section_contact['embeded_code'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label>
                            Skema Warna
                        </label>                             
                            <select name="section_contact[skema_warna]" class="form-control select-color-schema">
                                <option <?php echo ($get_section_contact['skema_warna'] =='' ? 'selected="selected"' : '');?> value="">-- Pilih Skema Warna --</option>
                                <option <?php echo ($get_section_contact['skema_warna'] =='default' ? 'selected="selected"' : '');?> value="default">Default</option>
                                <option <?php echo ($get_section_contact['skema_warna'] =='light' ? 'selected="selected"' : '');?> value="light">Light</option> 
                            </select>
                    </div> 
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_contact">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan Judul / Deskripsi Contact.</li>  
        <li>Isikan informasi pada kolom "Teks" (alamat, telp)</li>
        <li>"Google Map Source" untuk embeded code "iframe" dari googel map, kosongkan jika tidak ada</li> 
        <li>"Skema Warna" untuk menentukan warna background.</li>
    </ul>
</div>
<script>
$(function(){
  $(document).ready(function() {
     $('#section_contact_teks').summernote({
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
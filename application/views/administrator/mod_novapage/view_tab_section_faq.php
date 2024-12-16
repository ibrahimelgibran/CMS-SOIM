<?php echo form_open($this->uri->segment(1)."/novapage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_section_faq = isset($get_section_faq) ? $get_section_faq : array();  
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Section FAQs
            </h3>
        </div>
        <div class="card-body section-control">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="form-group">
                        <label>
                            Judul
                        </label>
                        <input type="text" class="form-control" name="section_faq[judul]"  value="<?php echo $get_section_faq['judul'];?>">
                    </div>
                    <div class="form-group">
                        <label>
                            Deskripsi
                        </label>
                        <textarea  name="section_faq[deskripsi]" rows="5" class="form-control"><?php echo $get_section_faq['deskripsi'];?></textarea>
                    </div> 
                    
                    <div class="form-group repeatable-control">
                        <div class="text-info-container"> 
                            <div class="dd-item-container"  id="item-section" data-type="section_faq">
                                <ol class="dd-list list-item-section">
                                <?php 
                                    if( isset($get_section_faq['item'])) {
                                        if( !empty( $get_section_faq['item'] )) {
                                            ?>
                                                <?php
                                                    foreach($get_section_faq['item'] as $i => $value_item) {
                                                        ?>
                                                        <li class="dd-item item-section" > 
                                                            <div class="dd-handle">
                                                                <i class="fa fa-arrows-alt"></i>
                                                            </div>
                                                        <?php
                                                        novapage_item_faqs(
                                                            $i, 
                                                            $value_item,  
                                                            'section_faq'
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
                            data-template="faqs-template"  
                            data-type="section_faq"  
                            class="btn-add-item btn btn-default btn-sm text-info-add mb-2"
                            >
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Item Faq
                        </button>
                    </div>  
 
                    <div class="form-group">
                        <label>
                            Skema Warna
                        </label>                             
                            <select name="section_faq[skema_warna]" class="form-control select-color-schema">
                                <option <?php echo ($get_section_faq['skema_warna'] =='' ? 'selected="selected"' : '');?> value="">-- Pilih Skema Warna --</option>
                                <option <?php echo ($get_section_faq['skema_warna'] =='default' ? 'selected="selected"' : '');?> value="default">Default</option>
                                <option <?php echo ($get_section_faq['skema_warna'] =='light' ? 'selected="selected"' : '');?> value="light">Light</option>
                                <option <?php echo ($get_section_faq['skema_warna'] =='dark' ? 'selected="selected"' : '');?> value="dark">Dark</option>  
                                <option <?php echo ($get_section_faq['skema_warna'] =='image' ? 'selected="selected"' : '');?> value="image">Dark + Gambar Background</option>
                            </select>
                    </div> 
                    <div class="form-group item-image">
                        <label>Gambar Background (optional)</label>
                        <div class="image-container btn-image">
                            <?php if(!empty( $get_section_faq['background'])){ ?>
                                <img src="<?php echo base_url('asset/img_novapage/images/'. $get_section_faq['background']);?>" /> 
                            <?php } else { ?>
                                <label>Pilih Gambar</label>
                            <?php } ?>
                        </div>
                        <input  
                            data-name="background"  
                            name="section_faq[background]"
                            value="<?php echo $get_section_faq['background'];?>"
                            type="hidden" class="item-image-text">
                        <a class="btn-image-clear" href="#">Hapus Gambar</a>
                    </div> 
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_faq">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan Judul / Deskripsi FAQs.</li>  
        <li>klik tombol "Tambah Item Faq" untuk Membuat FAQ .</li> 
        <li>"Skema Warna" untuk menentukan warna background.</li>
        <li>"Gambar Background (optional)" untuk menentukan gambar background jika memilih skema warna (Dark + Gambar Background).</li>
    </ul>
</div>
<script> 
$(function(){
  $(document).ready(function() {
     $('#section_faq_teks').summernote({
       height: 400,
       toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['fontname', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']], 
          ['view', ['codeview', 'help']],
       ]
     });
  });
}); 
</script>
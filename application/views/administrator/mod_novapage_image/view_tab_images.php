<style>
.no-logo{
    width: 250px;
    border: 1px solid #dee2e6;
    color: #dee2e6;
    justify-content: center;
    flex-direction: column;
    display: flex;
    text-align: center;
}
.title,
.nama{
    display: block;
    padding: 0;
    margin: 0;
    font-weight: normal !important;
}

.title{
    font-size:14px;
}

.no-data{
    text-align: center;
    border: 1px solid #dee2e6;
}

</style>
<div class="pt-4">
<div class="card"  style="min-height:450px">
    <div class="card-header bg-info">
        <h3 class="card-title py-1">
            Daftar Images
        </h3>
    </div>
    <div class="card-body">
        <table id="novapage-images-table" class="table table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width:40px">No</th>
                    <th style="width:250px">Logo</th>
                    <th>Nama</th> 
                    <th style="width:100px">Aksi</th>
                </tr>
            </thead>
            <tbody> 
            <?php if( !empty($get_images) ) {?>
                <?php $fpath = FCPATH;?>
                <?php foreach($get_images as $i => $image){?>
                <tr>
                    <td><?php echo $i+1;?></td>
                    <td>
                    <?php 
                        $img_file= $fpath .'asset/img_novapage/images/'.$image['file']; 
                        if(file_exists($img_file) && !empty($image['file'])) {
                            ?>
                            <img src="<?php echo base_url()."asset/img_novapage/images/".$image['file'];?>" style="width:100%">
                            <?php
                        } else {
                            ?>
                            <div class="no-logo">
                                No Logo
                            </div>
                            <?php
                        }
                    ?>
                    </td>
                    <td> 
                            <?php echo $image['deskripsi']; ?> 
                    </td> 
                    <td>
                        <button type="button" class="novapage-btn-client-edit btn btn-xs btn-success"
                            data-id="<?php echo $image['id_images'] ;?>"
                            data-deskripsi="<?php echo $image['deskripsi'] ;?>" 
                            data-file="<?php echo $image['file'] ;?>"
                            data-fileurl="<?php echo base_url()."asset/img_novapage/images/".$image['file'];?>"
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                        <?php echo form_open($this->uri->segment(1)."/novapage-images" , array('class'=> 'novapage-images-delete-form d-inline'));?>
                            <input type="hidden" value="<?php echo $image['id_images'];?> " name="id_delete">
                            <button data-nama="<?php echo $image['deskripsi'] ;?>" type="button" class="novapage-btn-client-delete btn btn-xs btn-danger" name="delete_client">
                                <i class="fa fa-trash-alt"></i>
                            </button>
                        <?php echo form_close();?>
                    </td>
                </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td class="no-data" colspan="4"> Belum ada images </td>
                </tr>
            <?php } ?>                
            </tbody>
        </table>
    </div>        
</div> 
</div>

<script>  
$(function(){ 
    $('.novapage-btn-client-delete').on('click', function(e){
        e.preventDefault(); 
        var result = confirm('Apakah anda akan menghapus client '+ $(this).data('deskripsi') +' ?')
        if(result) {
            $(this).closest('form.novapage-images-delete-form').submit();
        } 

    });
    $('.novapage-btn-client-edit').on('click', function(e){
        e.preventDefault(); 
        novapageImagesClearForm();

        // deactive tabs
        if($('#novapage-images .nav-tabs').find('a.nav-link').hasClass('active')){
            $('#novapage-images .nav-tabs').find('a.nav-link').removeClass('active');
            $('#novapage-images .nav-tabs').find('a.nav-link').removeClass('show'); 
        }
        
        if($('#novapage-images .tab-content').find('.tab-pane').hasClass('active')){ 
            $('#novapage-images .tab-content').find('.tab-pane').removeClass('active');
            $('#novapage-images .tab-content').find('.tab-pane').removeClass('show');
        }

        // active tab
        $('#novapage-images .nav-tabs .nav-link#novapage-images-form-tab').addClass('active');
        $('#novapage-images .nav-tabs .nav-link#novapage-images-form-tab').addClass('show');
        $('#novapage-images .tab-content .tab-pane#novapage-images-form').addClass('active');
        $('#novapage-images .tab-content .tab-pane#novapage-images-form').addClass('show');

        // form
        $('#novapage-images #novapage-images-form #novapage-images-form #id').val($(this).data('id'));
        $('#novapage-images #novapage-images-form #novapage-images-form #deskripsi').val($(this).data('deskripsi')); 

        if($(this).data('file')) {
            $('#novapage-images #novapage-images-form #novapage-images-form #file-image').html(
                '<img style="width:100%" src="'+ $(this).data('fileurl')+'" />'
            );
            $('#novapage-images #novapage-images-form #novapage-images-form #file-image-upload').removeAttr('required');
        }

    });
    
    $('#novapage-images a#novapage-images-form-tab').on('click',function(e){ 
        novapageImagesClearForm();
    });

    var novapageImagesClearForm = function(){        
        $('#novapage-images #novapage-images-form #novapage-images-form #id').val('');
        $('#novapage-images #novapage-images-form #novapage-images-form #deskripsi').val(''); 
        $('#novapage-images #novapage-images-form #novapage-images-form #file-image').html('');
        $('#novapage-images #novapage-images-form #novapage-images-form #file-image-upload').attr('required',''); 
    }

    $('#novapage-images-table').DataTable( );
      
      // auto remove / hide alert message
      if( $(document).find('#novapage-alert.alert')) {
          $('#novapage-alert.alert').fadeOut(3000,function(){
              //remove it 
              $('#novapage-alert.alert').remove();
          }); 
      }
    
});
</script>
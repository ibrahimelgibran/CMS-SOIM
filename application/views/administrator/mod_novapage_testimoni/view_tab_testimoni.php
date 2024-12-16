<style>
.no-photo{
    width: 80px;
    height: 80px;
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
            Daftar Testimoni
        </h3>
    </div>
    <div class="card-body">
        <table id="novapage-testimoni-table" class="table table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width:40px">No</th>
                    <th style="width:80px">Photo</th>
                    <th style="width:200px">Nama</th>
                    <th>Testimoni</th>
                    <th style="width:100px">Aksi</th>
                </tr>
            </thead>
            <tbody> 
            <?php if( !empty($get_testimoni) ) {?>
                <?php $fpath = FCPATH;?>
                <?php foreach($get_testimoni as $i => $testimoni){?>
                <tr>
                    <td><?php echo $i+1;?></td>
                    <td>
                    <?php 
                        $photo_file= $fpath .'asset/img_novapage/testimoni/'.$testimoni['photo']; 
                        if(file_exists($photo_file) && !empty($testimoni['photo'])) {
                            ?>
                            <img src="<?php echo base_url()."asset/img_novapage/testimoni/".$testimoni['photo'];?>" style="width:100%">
                            <?php
                        } else {
                            ?>
                            <div class="no-photo">
                                No Photo
                            </div>
                            <?php
                        }
                    ?>
                    </td>
                    <td>
                        <label class="nama">
                            <?php echo $testimoni['nama']; ?>
                        </label>
                        <label class="title"> 
                            ( <?php echo !empty($testimoni['profesi']) ? $testimoni['profesi']:'';?> )
                        </label>
                    </td>
                    <td><?php echo $testimoni['testimoni'];?></td>
                    <td>
                        <button type="button" class="novapage-btn-testimoni-edit btn btn-xs btn-success"
                            data-id="<?php echo $testimoni['id_testimoni'] ;?>"
                            data-nama="<?php echo $testimoni['nama'] ;?>"
                            data-profesi="<?php echo $testimoni['profesi'] ;?>"
                            data-testimoni="<?php echo $testimoni['testimoni'] ;?>"
                            data-photo="<?php echo $testimoni['photo'] ;?>"
                            data-photourl="<?php echo base_url()."asset/img_novapage/testimoni/".$testimoni['photo'];?>"
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                        <?php echo form_open($this->uri->segment(1)."/novapage-testimoni" , array('class'=> 'novapage-delete-form d-inline'));?>
                            <input type="hidden" value="<?php echo $testimoni['id_testimoni'];?> " name="id_delete">
                            <button data-nama="<?php echo $testimoni['nama'] ;?>" type="button" class="novapage-btn-testimoni-delete btn btn-xs btn-danger" name="delete_testimoni">
                                <i class="fa fa-trash-alt"></i>
                            </button>
                        <?php echo form_close();?>
                    </td>
                </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td class="no-data" colspan="5"> Belum ada testimoni </td>
                </tr>
            <?php } ?>                
            </tbody>
        </table>
    </div>        
</div> 
</div>

<script>  
$(function(){ 
    $('.novapage-btn-testimoni-delete').on('click', function(e){
        e.preventDefault(); 
        var result = confirm('Apakah anda akan menghapus testimoni dari '+ $(this).data('nama') +' ?')
        if(result) {
            $(this).closest('form.novapage-delete-form').submit();
        } 

    });
    $('.novapage-btn-testimoni-edit').on('click', function(e){
        e.preventDefault(); 
        novapageTestimoniClearForm();

        // deactive tabs
        if($('#novapage-testimoni .nav-tabs').find('a.nav-link').hasClass('active')){
            $('#novapage-testimoni .nav-tabs').find('a.nav-link').removeClass('active');
            $('#novapage-testimoni .nav-tabs').find('a.nav-link').removeClass('show'); 
        }
        
        if($('#novapage-testimoni .tab-content').find('.tab-pane').hasClass('active')){ 
            $('#novapage-testimoni .tab-content').find('.tab-pane').removeClass('active');
            $('#novapage-testimoni .tab-content').find('.tab-pane').removeClass('show');
        }

        // active tab
        $('#novapage-testimoni .nav-tabs .nav-link#content-testimoni-form-tab').addClass('active');
        $('#novapage-testimoni .nav-tabs .nav-link#content-testimoni-form-tab').addClass('show');
        $('#novapage-testimoni .tab-content .tab-pane#content-testimoni-form').addClass('active');
        $('#novapage-testimoni .tab-content .tab-pane#content-testimoni-form').addClass('show');

        // form
        $('#novapage-testimoni #content-testimoni-form #novapage-testimoni-form #id').val($(this).data('id'));
        $('#novapage-testimoni #content-testimoni-form #novapage-testimoni-form #nama').val($(this).data('nama'));
        $('#novapage-testimoni #content-testimoni-form #novapage-testimoni-form #profesi').val($(this).data('profesi'));
        $('#novapage-testimoni #content-testimoni-form #novapage-testimoni-form #testimoni').val($(this).data('testimoni'));

        if($(this).data('photo')) {
            $('#novapage-testimoni #content-testimoni-form #novapage-testimoni-form #file-photo').html(
                '<img style="width:100%" src="'+ $(this).data('photourl')+'" />'
            );
            $('#novapage-testimoni #content-testimoni-form #novapage-testimoni-form #file-photo-upload').removeAttr('required');
        }

    });
    
    $('#novapage-testimoni a#content-testimoni-form-tab').on('click',function(e){ 
        novapageTestimoniClearForm();
    });

    var novapageTestimoniClearForm = function(){        
        $('#novapage-testimoni #content-testimoni-form #novapage-testimoni-form #id').val('');
        $('#novapage-testimoni #content-testimoni-form #novapage-testimoni-form #nama').val('');
        $('#novapage-testimoni #content-testimoni-form #novapage-testimoni-form #profesi').val('');
        $('#novapage-testimoni #content-testimoni-form #novapage-testimoni-form #testimoni').val('');
        $('#novapage-testimoni #content-testimoni-form #novapage-testimoni-form #file-photo').html('');
        $('#novapage-testimoni #content-testimoni-form #novapage-testimoni-form #file-photo-upload').attr('required',''); 
    }

    $('#novapage-testimoni-table').DataTable( );
      
      // auto remove / hide alert message
      if( $(document).find('#novapage-alert.alert')) {
          $('#novapage-alert.alert').fadeOut(3000,function(){
              //remove it 
              $('#novapage-alert.alert').remove();
          }); 
      }
});
</script>
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
            Daftar Client
        </h3>
    </div>
    <div class="card-body">
        <table id="novapage-client-table" class="table table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width:40px">No</th>
                    <th style="width:250px">Logo</th>
                    <th>Nama</th> 
                    <th style="width:100px">Aksi</th>
                </tr>
            </thead>
            <tbody> 
            <?php if( !empty($get_client) ) {?>
                <?php $fpath = FCPATH;?>
                <?php foreach($get_client as $i => $client){?>
                <tr>
                    <td><?php echo $i+1;?></td>
                    <td>
                    <?php 
                        $logo_file= $fpath .'asset/img_novapage/client/'.$client['logo']; 
                        if(file_exists($logo_file) && !empty($client['logo'])) {
                            ?>
                            <img src="<?php echo base_url()."asset/img_novapage/client/".$client['logo'];?>" style="width:100%">
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
                            <?php echo $client['nama']; ?> 
                    </td> 
                    <td>
                        <button type="button" class="novapage-btn-client-edit btn btn-xs btn-success"
                            data-id="<?php echo $client['id_client'] ;?>"
                            data-nama="<?php echo $client['nama'] ;?>" 
                            data-logo="<?php echo $client['logo'] ;?>"
                            data-logourl="<?php echo base_url()."asset/img_novapage/client/".$client['logo'];?>"
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                        <?php echo form_open($this->uri->segment(1)."/novapage-client" , array('class'=> 'novapage-client-delete-form d-inline'));?>
                            <input type="hidden" value="<?php echo $client['id_client'];?> " name="id_delete">
                            <button data-nama="<?php echo $client['nama'] ;?>" type="button" class="novapage-btn-client-delete btn btn-xs btn-danger" name="delete_client">
                                <i class="fa fa-trash-alt"></i>
                            </button>
                        <?php echo form_close();?>
                    </td>
                </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td class="no-data" colspan="4"> Belum ada client </td>
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
        var result = confirm('Apakah anda akan menghapus client '+ $(this).data('nama') +' ?')
        if(result) {
            $(this).closest('form.novapage-client-delete-form').submit();
        } 

    });
    $('.novapage-btn-client-edit').on('click', function(e){
        e.preventDefault(); 
        novapageClientClearForm();

        // deactive tabs
        if($('#novapage-client .nav-tabs').find('a.nav-link').hasClass('active')){
            $('#novapage-client .nav-tabs').find('a.nav-link').removeClass('active');
            $('#novapage-client .nav-tabs').find('a.nav-link').removeClass('show'); 
        }
        
        if($('#novapage-client .tab-content').find('.tab-pane').hasClass('active')){ 
            $('#novapage-client .tab-content').find('.tab-pane').removeClass('active');
            $('#novapage-client .tab-content').find('.tab-pane').removeClass('show');
        }

        // active tab
        $('#novapage-client .nav-tabs .nav-link#content-client-form-tab').addClass('active');
        $('#novapage-client .nav-tabs .nav-link#content-client-form-tab').addClass('show');
        $('#novapage-client .tab-content .tab-pane#content-client-form').addClass('active');
        $('#novapage-client .tab-content .tab-pane#content-client-form').addClass('show');

        // form
        $('#novapage-client #content-client-form #novapage-client-form #id').val($(this).data('id'));
        $('#novapage-client #content-client-form #novapage-client-form #nama').val($(this).data('nama')); 

        if($(this).data('logo')) {
            $('#novapage-client #content-client-form #novapage-client-form #file-logo').html(
                '<img style="width:100%" src="'+ $(this).data('logourl')+'" />'
            );
            $('#novapage-client #content-client-form #novapage-client-form #file-logo-upload').removeAttr('required');
        }

    });
    
    $('#novapage-client a#content-client-form-tab').on('click',function(e){ 
        novapageClientClearForm();
    });

    var novapageClientClearForm = function(){        
        $('#novapage-client #content-client-form #novapage-client-form #id').val('');
        $('#novapage-client #content-client-form #novapage-client-form #nama').val(''); 
        $('#novapage-client #content-client-form #novapage-client-form #file-logo').html('');
        $('#novapage-client #content-client-form #novapage-client-form #file-logo-upload').attr('required',''); 
    }

    $('#novapage-client-table').DataTable( );
      
      // auto remove / hide alert message
      if( $(document).find('#novapage-alert.alert')) {
          $('#novapage-alert.alert').fadeOut(3000,function(){
              //remove it 
              $('#novapage-alert.alert').remove();
          }); 
      }
    
});
</script>
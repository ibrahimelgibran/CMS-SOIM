<style>
.no-image{
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
            Daftar Portfolio
        </h3>
    </div>
    <div class="card-body">
        <table id="novapage-portfolio-table" class="table table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width:40px">No</th>
                    <th style="width:250px">Image</th>
                    <th>Nama Project</th> 
                    <th>Nama Client</th> 
                    <th style="width:100px">Aksi</th>
                </tr>
            </thead>
            <tbody> 
            <?php if( !empty($get_portfolio) ) {?>
                <?php $fpath = FCPATH;?>
                <?php foreach($get_portfolio as $i => $portfolio){?>
                <tr>
                    <td><?php echo $i+1;?></td>
                    <td>
                    <?php 
                        $image_file= $fpath .'asset/img_novapage/portfolio/'.$portfolio['image']; 
                        if(file_exists($image_file) && !empty($portfolio['image'])) {
                            ?>
                            <img src="<?php echo base_url()."asset/img_novapage/portfolio/".$portfolio['image'];?>" style="width:100%">
                            <?php
                        } else {
                            ?>
                            <div class="no-image">
                                No Image
                            </div>
                            <?php
                        }
                    ?>
                    </td>
                    <td> 
                            <?php echo $portfolio['nama_project']; ?> 
                            <div>
                            <?php echo $portfolio['deskripsi']; ?> 
                            </div>
                    </td> 
                    <td> 
                            <?php echo $portfolio['nama_client']; ?> 
                    </td> 
                    <td>
                        <button type="button" class="novapage-btn-portfolio-edit btn btn-xs btn-success"
                            data-id="<?php echo $portfolio['id_portfolio'] ;?>"
                            data-namaproject="<?php echo $portfolio['nama_project'] ;?>"
                            data-namaclient="<?php echo $portfolio['nama_client'] ;?>"
                            data-deskripsi="<?php echo $portfolio['deskripsi'] ;?>"
                            data-portfolio="<?php echo $portfolio['portfolio'] ;?>"
                            data-image="<?php echo $portfolio['image'] ;?>"
                            data-imageurl="<?php echo base_url()."asset/img_novapage/portfolio/".$portfolio['image'];?>"
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                        <?php echo form_open($this->uri->segment(1)."/novapage-portfolio" , array('class'=> 'novapage-portfolio-delete-form d-inline'));?>
                            <input type="hidden" value="<?php echo $portfolio['id_portfolio'];?> " name="id_delete">
                            <button data-nama="<?php echo $portfolio['nama'] ;?>" type="button" class="novapage-btn-portfolio-delete btn btn-xs btn-danger" name="delete_portfolio">
                                <i class="fa fa-trash-alt"></i>
                            </button>
                        <?php echo form_close();?>
                    </td>
                </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td class="no-data" colspan="5"> Belum ada portfolio </td>
                </tr>
            <?php } ?>                
            </tbody>
        </table>
    </div>        
</div> 
</div>

<script>  
$(function(){ 
    $('.novapage-btn-portfolio-delete').on('click', function(e){
        e.preventDefault(); 
        var result = confirm('Apakah anda akan menghapus portfolio '+ $(this).data('nama') +' ?')
        if(result) {
            $(this).closest('form.novapage-portfolio-delete-form').submit();
        } 

    });
    $('.novapage-btn-portfolio-edit').on('click', function(e){
        e.preventDefault(); 
        novapagePortfolioClearForm();

        // deactive tabs
        if($('#novapage-portfolio .nav-tabs').find('a.nav-link').hasClass('active')){
            $('#novapage-portfolio .nav-tabs').find('a.nav-link').removeClass('active');
            $('#novapage-portfolio .nav-tabs').find('a.nav-link').removeClass('show'); 
        }
        
        if($('#novapage-portfolio .tab-content').find('.tab-pane').hasClass('active')){ 
            $('#novapage-portfolio .tab-content').find('.tab-pane').removeClass('active');
            $('#novapage-portfolio .tab-content').find('.tab-pane').removeClass('show');
        }

        // active tab
        $('#novapage-portfolio .nav-tabs .nav-link#content-portfolio-form-tab').addClass('active');
        $('#novapage-portfolio .nav-tabs .nav-link#content-portfolio-form-tab').addClass('show');
        $('#novapage-portfolio .tab-content .tab-pane#content-portfolio-form').addClass('active');
        $('#novapage-portfolio .tab-content .tab-pane#content-portfolio-form').addClass('show');

        // form
        $('#novapage-portfolio #content-portfolio-form #novapage-portfolio-form #id').val($(this).data('id'));
        $('#novapage-portfolio #content-portfolio-form #novapage-portfolio-form #nama-project').val($(this).data('namaproject')); 
        $('#novapage-portfolio #content-portfolio-form #novapage-portfolio-form #nama-client').val($(this).data('namaclient')); 
        $('#novapage-portfolio #content-portfolio-form #novapage-portfolio-form #deskripsi').val($(this).data('deskripsi'));  
        $('#novapage-portfolio #content-portfolio-form #novapage-portfolio-form #url').val($(this).data('url')); 


        if($(this).data('image')) {
            $('#novapage-portfolio #content-portfolio-form #novapage-portfolio-form #file-image').html(
                '<img style="width:100%" src="'+ $(this).data('imageurl')+'" />'
            );
            $('#novapage-portfolio #content-portfolio-form #novapage-portfolio-form #file-image-upload').removeAttr('required');
        }

    });
    
    $('#novapage-portfolio a#content-portfolio-form-tab').on('click',function(e){ 
        novapagePortfolioClearForm();
    });

    var novapagePortfolioClearForm = function(){        
        $('#novapage-portfolio #content-portfolio-form #novapage-portfolio-form #id').val('');
        $('#novapage-portfolio #content-portfolio-form #novapage-portfolio-form #nama-project').val(''); 
        $('#novapage-portfolio #content-portfolio-form #novapage-portfolio-form #nama-client').val(''); 
        $('#novapage-portfolio #content-portfolio-form #novapage-portfolio-form #deskripsi').val(''); 
        $('#novapage-portfolio #content-portfolio-form #novapage-portfolio-form #url').val(''); 
        $('#novapage-portfolio #content-portfolio-form #novapage-portfolio-form #file-image').html('');
        $('#novapage-portfolio #content-portfolio-form #novapage-portfolio-form #file-image-upload').attr('required',''); 
    }

    $('#novapage-portfolio-table').DataTable( );
      
      // auto remove / hide alert message
      if( $(document).find('#novapage-alert.alert')) {
          $('#novapage-alert.alert').fadeOut(3000,function(){
              //remove it 
              $('#novapage-alert.alert').remove();
          }); 
      }
});
</script>
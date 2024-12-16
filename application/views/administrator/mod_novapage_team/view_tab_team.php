<style>
.no-photo{
    width: 200px;
    height: 200px;
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
            Daftar Team
        </h3>
    </div>
    <div class="card-body">
        <table id="novapage-team-table" class="table table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width:40px">No</th>
                    <th style="width:200px">Photo</th>
                    <th>Nama</th>
                    <th style="width:100px">Aksi</th>
                </tr>
            </thead>
            <tbody> 
            <?php if( !empty($get_team) ) {?>
                <?php $fpath = FCPATH;?>
                <?php foreach($get_team as $i => $team){?>
                <tr>
                    <td><?php echo $i+1;?></td>
                    <td>
                    <?php 
                        $photo_file= $fpath .'asset/img_novapage/team/'.$team['photo']; 
                        if(file_exists($photo_file) && !empty($team['photo'])) {
                            ?>
                            <img src="<?php echo base_url()."asset/img_novapage/team/".$team['photo'];?>" style="width:100%">
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
                            <?php echo $team['nama']; ?>
                        </label>
                        <label class="title"> 
                            ( <?php echo !empty($team['jabatan']) ? $team['jabatan']:'';?> )
                        </label>
                        <ul>
                            <li>FB: <?php echo $team['socmed_fb'];?></li>
                            <li>Twitter: <?php echo $team['socmed_twitter'];?></li>
                            <li>IG: <?php echo $team['socmed_ig'];?></li>
                            <li>LinkedIn: <?php echo $team['socmed_linkedin'];?></li>
                        </ul>
                    </td> 
                    <td>
                        <button type="button" class="novapage-btn-team-edit btn btn-xs btn-success"
                            data-id="<?php echo $team['id_team'] ;?>"
                            data-nama="<?php echo $team['nama'] ;?>"
                            data-jabatan="<?php echo $team['jabatan'] ;?>"
                            data-socmedfb="<?php echo $team['socmed_fb'] ;?>"
                            data-socmedtwitter="<?php echo $team['socmed_twitter'] ;?>"
                            data-socmedig="<?php echo $team['socmed_ig'] ;?>"
                            data-socmedlinkedin="<?php echo $team['socmed_linkedin'] ;?>"
                            data-photo="<?php echo $team['photo'] ;?>"
                            data-photourl="<?php echo base_url()."asset/img_novapage/team/".$team['photo'];?>"
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                        <?php echo form_open($this->uri->segment(1)."/novapage-team" , array('class'=> 'novapage-team-delete-form d-inline'));?>
                            <input type="hidden" value="<?php echo $team['id_team'];?> " name="id_delete">
                            <button data-nama="<?php echo $team['nama'] ;?>" type="button" class="novapage-btn-team-delete btn btn-xs btn-danger" name="delete_team">
                                <i class="fa fa-trash-alt"></i>
                            </button>
                        <?php echo form_close();?>
                    </td>
                </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td class="no-data" colspan="4"> Belum ada team </td>
                </tr>
            <?php } ?>                
            </tbody>
        </table>
    </div>        
</div> 
</div>

<script>  
$(function(){ 
    $('.novapage-btn-team-delete').on('click', function(e){
        e.preventDefault(); 
        var result = confirm('Apakah anda akan menghapus team '+ $(this).data('nama') +' ?')
        if(result) {
            $(this).closest('form.novapage-team-delete-form').submit();
        } 

    });
    $('.novapage-btn-team-edit').on('click', function(e){
        e.preventDefault(); 
        novapageTeamClearForm();

        // deactive tabs
        if($('#novapage-team .nav-tabs').find('a.nav-link').hasClass('active')){
            $('#novapage-team .nav-tabs').find('a.nav-link').removeClass('active');
            $('#novapage-team .nav-tabs').find('a.nav-link').removeClass('show'); 
        }
        
        if($('#novapage-team .tab-content').find('.tab-pane').hasClass('active')){ 
            $('#novapage-team .tab-content').find('.tab-pane').removeClass('active');
            $('#novapage-team .tab-content').find('.tab-pane').removeClass('show');
        }

        // active tab
        $('#novapage-team .nav-tabs .nav-link#content-team-form-tab').addClass('active');
        $('#novapage-team .nav-tabs .nav-link#content-team-form-tab').addClass('show');
        $('#novapage-team .tab-content .tab-pane#content-team-form').addClass('active');
        $('#novapage-team .tab-content .tab-pane#content-team-form').addClass('show');

        // form
        $('#novapage-team #content-team-form #novapage-team-form #id').val($(this).data('id'));
        $('#novapage-team #content-team-form #novapage-team-form #nama').val($(this).data('nama'));
        $('#novapage-team #content-team-form #novapage-team-form #jabatan').val($(this).data('jabatan'));
        $('#novapage-team #content-team-form #novapage-team-form #socmed-fb').val($(this).data('socmedfb'));
        $('#novapage-team #content-team-form #novapage-team-form #socmed-twitter').val($(this).data('socmedtwitter'));
        $('#novapage-team #content-team-form #novapage-team-form #socmed-ig').val($(this).data('socmedig'));
        $('#novapage-team #content-team-form #novapage-team-form #socmed-linkedin').val($(this).data('socmedlinkedin'));

        if($(this).data('photo')) {
            $('#novapage-team #content-team-form #novapage-team-form #file-photo').html(
                '<img style="width:100%" src="'+ $(this).data('photourl')+'" />'
            );
            $('#novapage-team #content-team-form #novapage-team-form #file-photo-upload').removeAttr('required');
        }

    });
    
    $('#novapage-team a#content-team-form-tab').on('click',function(e){ 
        novapageTeamClearForm();
    });

    var novapageTeamClearForm = function(){        
        $('#novapage-team #content-team-form #novapage-team-form #id').val('');
        $('#novapage-team #content-team-form #novapage-team-form #nama').val('');
        $('#novapage-team #content-team-form #novapage-team-form #jabatan').val('');
        $('#novapage-team #content-team-form #novapage-team-form #socmed-fb').val('');
        $('#novapage-team #content-team-form #novapage-team-form #socmed-twitter').val('');
        $('#novapage-team #content-team-form #novapage-team-form #socmed-ig').val('');
        $('#novapage-team #content-team-form #novapage-team-form #socmed-linkedin').val('');
        $('#novapage-team #content-team-form #novapage-team-form #file-photo').html('');
        $('#novapage-team #content-team-form #novapage-team-form #file-photo-upload').attr('required',''); 
    }

    $('#novapage-team-table').DataTable( );
      
      // auto remove / hide alert message
      if( $(document).find('#novapage-alert.alert')) {
          $('#novapage-alert.alert').fadeOut(3000,function(){
              //remove it 
              $('#novapage-alert.alert').remove();
          }); 
      }
});
</script>
<?php echo form_open_multipart($this->uri->segment(1)."/novapage-images",array('id'=>'novapage-images-form', 'class'=> 'form-horizontal pt-4' )) ;?> 
<div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Form Image
            </h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Deksripsi *
                </label>
                <div class="col-sm-6">
                    <input id="id" type="hidden" class="form-control" name="id_edit">
                    <input placeholder="Nama" id="deskripsi" type="text" class="form-control" name="deskripsi" required="required">
                </div>
            </div> 
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Image *
                </label>
                <div class="col-sm-6">
                     <input  id="file-image-upload" type="file" name="file" required="required">
                     <div class="file-name logo-upload-preview" id="file-image"></div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_images">Simpan</button>
        </div>        
</div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan nama dan logo client.</li>
    </ul>
</div>
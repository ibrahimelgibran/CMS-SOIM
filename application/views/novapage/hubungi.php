<?php

/**
 * untuk generate captcha
 */
$this->load->helper('captcha');
$vals = array(
    'img_path'	 => './captcha/',
    'img_url'	 => base_url().'captcha/',
    'font_size'     => 17,
    'img_width'	 => '150',
    'img_height' => 29,
    'border' => 0, 
    'word_length'   => 5,
    'expiration' => 7200
);
    
$security_code = create_captcha($vals);     
$this->session->set_userdata('captcha_contact', $security_code['word']); 

?>

<div class="post-head mb-4"> 
    <?php echo $title;?>
</div>  
<div class="blog card detail mb-4">
	<div class="card-body">  
		<?php if(!empty($iden['maps'])) { ?>
		<div class="google-maps">
			<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo "$iden[maps]"; ?>"></iframe>
		</div>
		<?php } ?>
		<div class="card-text">			
			<?php echo "$rows[alamat]";?>
		</div>
		<?php echo form_open('contact-us');?>
			<?php  
				$alert = $this->session->flashdata('contact_message');   
				if( !empty($alert) && isset($alert['success'])) {?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								<span class="sr-only">Close</span>
							</button>
						<?php echo $alert['success'];?>
					</div>
					<?php
				}
				if( !empty($alert) && isset($alert['warning'])) {?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								<span class="sr-only">Close</span>
							</button>
						<?php echo $alert['warning'];?>
					</div>
					<?php
				}
			?>
			
			<div class="row">
				<div class="form-group col-md-6">
					<label>Nama *</label>
					<input type="text" placeholder="Nama" name='nama' required class="form-control" />
				</div>				
				<div class="form-group col-md-6">				
					<label>E-mail *</label>
					<input type="text" placeholder="E-mail" name='email' required class="form-control" />
				</div>
			</div> 			
			<div class="row">
				<div class="form-group col-md-12">
					<label for="c_message">Pesan<span class="required">*</span></label>
					<textarea rows="8" name='pesan' placeholder="Pesan" required class="form-control" ></textarea>
				</div>
			</div>  						
			<div class="row">
                <div class="form-group col-md-12">
                    <label>Kode Keamanan * </label>
                    <div class="input-group">
                        <div class="input-group-prepend security-code">
                  			<?php echo $security_code['image']; ?> 
                        </div>
                        <input name='security_code' maxlength=6 type="text" class="required form-control" placeholder="Masukkkan kode keamanan">
                    </div>                                                
                </div> 
			</div> 
			<div class="row">
				<div class="form-group col-md-12">
					<input name='kirim_hubungi' type="hidden">
					<input type="submit" name="kirim" class="btn btn-theme" value="Kirim" onclick="return confirm('Pesan anda ini akan kami balas melalui email ?')"/>
				</div>
			</div>	
		<?php echo form_close();?>
	</div> 
</div> 
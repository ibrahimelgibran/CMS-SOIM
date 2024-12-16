<style>
    .checkbox-group{
        font-size:14px;   
        padding: 5px 0;
        font-style: italic;
    }
</style>
<?php echo form_open($this->uri->segment(1)."/novapage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_section_hero = isset($get_section_hero) ? $get_section_hero : array(); 
        $get_halaman_seo_dropdown = isset($get_halaman_seo_dropdown) ? $get_halaman_seo_dropdown : array(); 
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Section Hero
            </h3>
        </div>
        <div class="card-body section-control">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="form-group repeatable-control">
                        <div class="text-info-container">
                            <div class="dd-item-container"  id="item-section" data-type="section_hero">
                                <ol class="dd-list list-item-section">
                                <?php 
                                    if( isset($get_section_hero['item'])) {
                                        if( !empty( $get_section_hero['item'] )) {
                                            ?>
                                                <?php
                                                    foreach($get_section_hero['item'] as $i => $value_item) {
                                                        ?>
                                                        <li class="dd-item item-section" > 
                                                            <div class="dd-handle">
                                                                <i class="fa fa-arrows-alt"></i>
                                                            </div>
                                                        <?php
                                                        novapage_item_text_gambar(
                                                            $i, 
                                                            $value_item, 
                                                            $get_halaman_seo_dropdown,
                                                            'section_hero'
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
                            data-template="text-gambar-template" 
                            data-type="section_hero"  
                            class="btn-add-item btn btn-default btn-sm text-info-add mb-2"
                            >
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Item
                        </button>
                    </div>   
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_hero">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>klik tombol "Tambah Item" untuk Membuat Slide .</li>  
    </ul>
</div>
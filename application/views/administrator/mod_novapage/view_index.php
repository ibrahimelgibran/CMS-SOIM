<style>
<?php 
      echo "@font-face {";
      echo "  font-family: 'FontAwesome';";
      echo "  src: url('". base_url('template/novapage/fonts')."/fontawesome-webfont.eot?v=4.7.0');";
      echo "  src: url('". base_url('template/novapage/fonts')."/fontawesome-webfont.eot?#iefix&v=4.7.0') format('embedded-opentype'), ";
      echo "       url('". base_url('template/novapage/fonts')."/fontawesome-webfont.woff2?v=4.7.0') format('woff2'), ";
      echo "       url('". base_url('template/novapage/fonts')."/fontawesome-webfont.woff?v=4.7.0') format('woff'), ";
      echo "       url('". base_url('template/novapage/fonts')."/fontawesome-webfont.ttf?v=4.7.0') format('truetype'), ";
      echo "       url('". base_url('template/novapage/fonts')."/fontawesome-webfont.svg?v=4.7.0#fontawesomeregular') format('svg');";
      echo "  font-weight: normal;";
      echo "  font-style: normal;";
      echo "}";
      echo file_get_contents(VIEWPATH.'administrator/mod_novapage/css/font-awesome.css');
?>
 
.tab-container{
      display: flex;
      flex-direction: row;
}
.tab-container .tab-container-navigation{
      width: 225px;
}


.tab-container .tab-container-navigation .nav-tabs {
      display:block;
}

.tab-container .tab-container-content{
      width: 100%;
}
.tab-container .tab-container-content .tab-content{
      min-height: 650px;
}

.nav-tabs .nav-link {
      border: 1px solid #eff2f5;
      background: #f9f9f9;
      color: #a8a8a8;
      margin: 0;
      border-radius:0;
}
.nav-tabs .nav-link.active {      
      border-top: 1px solid #17a2b8;
      border-left: 1px solid #17a2b8;
      border-bottom: 1px solid #17a2b8;
      border-right: 0;
      background: #17a2b8;
      color:#fff;
}


#novapage-alert{
      position: absolute;
      left: 0;
      right: 0;
      top:0;
      margin: 0 20px;
}

.style-alert-success{
      color: #23923d;
      border-color: #23923d;
      background: #e8f9ec;
}
 
.style-alert-danger{
      color: #dc3545;
      border-color: #dc3545;
      background: #ffe3e5;
}
.tab-content {
      padding: 0 20px 20px 20px;
      border: 1px solid #dee2e6;
}



.image-open,
.icon-open{
      overflow:hidden;
}

#image-overlay,
#icon-overlay{
      background: #00000029;
      position: fixed;
      left: 0;
      right: 0;
      bottom: 0;
      top: 0;
      z-index: 1040; 
}

#image-overlay.hide,
#icon-overlay.hide{
      display:none;
}

#image-overlay .image-pack,
#icon-overlay .icon-pack{
      position: absolute;
      top: 0;
      bottom: 0;
      background: #eaeaea;
      left: 0;
      right: auto;
      width: calc(100% - 40px);
      margin: 20px;
      border: 3px solid #17a2b8;
      border-radius: 4px;
}
#image-overlay .image-pack .image-header,
#icon-overlay .icon-pack .icon-header{
      padding: 15px;
      background: #17a2b8;
      color: #fff;
}

#image-overlay .image-pack .image-list,
#icon-overlay .icon-pack .icon-list {
      overflow: auto;
      position: absolute;
      left: 0;
      right: 0;
      top: 55px;
      bottom: 10px;
}

#image-overlay .image-pack .image-list ul,
#icon-overlay .icon-pack .icon-list ul {
    list-style: none; 
    margin: 0;
    padding: 0 0 0 10px;
    display: flex;
    flex-wrap: wrap;
}

#image-overlay .image-pack .image-list .image ,
#icon-overlay .icon-pack .icon-list .icon {    
    font-size: 28px;
    margin: 5px;
    border: 1px solid #7e8993;
    display: inline-block;
    line-height: 1.5;
    cursor: pointer
} 

#image-overlay .image-pack .image-list .image{
      width: 150px;
      height: 150px;
      background: #fff;
      justify-content: center;
      text-align: center;
      display: flex;
      flex-direction: column;
      overflow:hidden;
}

#icon-overlay .icon-pack .icon-list .icon { 
      min-width: 280px;
      min-height: 48px; 
}

#icon-overlay .icon-pack .icon-list .icon .fa{
  padding: 0 10px;
}

#image-overlay .image-pack .image-list .image .label,
#icon-overlay .icon-pack .icon-list .icon .label{
    font-weight: normal;
    font-size: 16px;
    padding-right: 10px;
    cursor: pointer
}
#image-overlay .image-pack .image-list li img{
      width:100%;
}

#image-overlay .image-pack .image-list .image:hover,
#image-overlay .image-pack .image-list .image:focus ,
#icon-overlay .icon-pack .icon-list .icon:hover,
#icon-overlay .icon-pack .icon-list .icon:focus {   
    background-color: #fbfbfc;
    border-color: #17a2b8;
    border-style: solid;
    box-shadow: 0 0 0 1px #17a2b8;
    outline: 2px solid transparent;
} 

#image-overlay .image-pack .image-list .image.select,
#icon-overlay .icon-pack .icon-list .icon.select {
      border: 3px solid #17a2b8;
}

#image-overlay .image-pack .image-header .btn-close,
#icon-overlay .icon-pack .icon-header .btn-close {
    position: absolute;
    right: 5px;
    top: 8px;
    padding: 8px 10px;
    color: #fff;
    background: #dc3545;
    border-radius: 3px;
    cursor: pointer;
}


#image-overlay .image-pack .image-header .btn-close:hover,
#icon-overlay .icon-pack .icon-header .btn-close:hover{
    background: #97111e;
}


.dd-dragel >  li.item-section.dd-item .item .image-container,
.dd-dragel >  li.item-section.dd-item .item .icon-container,
.section-control .image-container,
.section-control .icon-container,
.repeatable-control .item .image-container,
.repeatable-control .item .icon-container  {
      border: 1px dashed #ced4da;
      padding: 5px;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      cursor: pointer;
} 

.dd-dragel >  li.item-section.dd-item .item .image-container ,
.section-control .image-container,
.repeatable-control .item .image-container {
      width: 200px;
      min-height: 100px;
      overflow: hidden;
}

.dd-dragel >  li.item-section.dd-item .item .image-container img,
.section-control .image-container img,
.repeatable-control .item .image-container img{
      width:100%;
}

.dd-dragel >  li.item-section.dd-item .item .icon-container ,
.section-control .icon-container,
.repeatable-control .item .icon-container {
      width: 100px;
      height: 100px;
}

.dd-dragel >  li.item-section.dd-item .item .icon-container i,
.section-control .icon-container i,
.repeatable-control .item .icon-container i {
      font-size: 35px;
}

.section-control .image-container:hover,
.section-control .icon-container:hover,
.repeatable-control .item .image-container:hover,
.repeatable-control .item .icon-container:hover{
    background: #ced4da;
}

.dd-dragel >  li.item-section.dd-item .item .image-container label ,
.dd-dragel >  li.item-section.dd-item .item .icon-container label ,
.section-control .image-container label ,
.section-control .icon-container label,
.repeatable-control .item .image-container label ,
.repeatable-control .item .icon-container label {    
    font-weight: normal;
    font-size: 14px;
    margin: 0;
    padding: 0;
    cursor: pointer;
} 

.dd-dragel >  li.item-section.dd-item .item .btn-image-clear,
.dd-dragel >  li.item-section.dd-item .item .btn-icon-clear,
.section-control .btn-image-clear,
.section-control .btn-icon-clear,
.repeatable-control .item .btn-image-clear,
.repeatable-control .item .btn-icon-clear{
  color: #dc3545;
}

.section-control .btn-image-clear:hover,
.section-control .btn-icon-clear:hover,
.repeatable-control .item .btn-image-clear:hover,
.repeatable-control .item .btn-icon-clear:hover{
  text-decoration: underline;
}

.repeatable-control .card,
.repeatable-control .card .card-header {
      border-radius: 0;
} 

.repeatable-control .card .card-header  {
      padding: 10px 20px;
}


ol.list-item-section{
    list-style:none;    
    margin: 0;
    padding: 0;
}


li.item-section {
    line-height:20px;
}
li.item-section .card ,
li.item-section.dd-item .card {
    margin-bottom: 10px;
}


li.item-section .card .card-header .card-title,
li.item-section.dd-item .card .card-header .card-title{
    font-size:15px; 
}

.dd-dragel >  li.item-section.dd-item .card .card-header,
.dd-dragel >  li.item-section.dd-item .card,
ol.list-item-section li .card .card-header,
ol.list-item-section li .card{
    border-radius:0;
}
 
.dd-dragel >  li.item-section.dd-item .dd-handle { 
    margin:0; 
    border-radius: 0;   
    height:100%; 
}

ol.list-item-section li .dd-handle{
    margin: 0; 
    border-radius: 0; 
    height: auto;
    cursor: move;
    padding: 5px;
    font-weight: normal;
}

.dd-dragel >  li.item-section.dd-item .dd-handle ,
ol.list-item-section li.dd-item .dd-handle{
    float: left;
    padding: 8px 10px;
    font-size: 15px;
    line-height: 1.5em; 
} 

.btn-icon-clear,
.btn-image-clear{
      font-size:14px;
}

.form-input-text,
.form-select,
.select-color-schema,
.select-link-type{
    width: 200px;
}
</style>
<?php

      $this->load->helper('text');
      // for widget control
      include 'controls/view_widget_control.php'; 

      // for sections control 
      include 'controls/view_item_control.php';  
      include 'controls/view_icon_pack.php';
 
      $get_sections_aktif = isset($get_sections_aktif) ? $get_sections_aktif : array();  
?>
<div class="card" id="novapage-panel">
    <div class="card-header bg-secondary">
        <h3 class="card-title py-1">Konfigurasi Template Novapage</h3>
    </div> 
        <div class="card-body">
            <?php      
            if($this->session->flashdata('alert')!=null) {?>
                  <div id="novapage-alert" class="alert style-alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              <span class="sr-only">Close</span>
                        </button>
                       <?php echo $this->session->flashdata('alert');?>
                  </div>
            <?php
            }
            ?>
            <div class="tab-container">
               <div class="tab-container-navigation">                        
                        <ul class="nav nav-tabs"role="tablist"> 
                              <li class="nav-item">
                              <a class="nav-link active" id="content_home_tab" data-toggle="pill" href="#content_home" role="tab"
                                    aria-controls="content-home" aria-selected="true">Home</a>
                              </li>
                              <li class="nav-item">
                                    <a class="nav-link " id="content_lokasi_menu_tab" data-toggle="pill" href="#content_lokasi_menu" role="tab"
                                    aria-controls="content" aria-selected="false">Setting Menu</a>
                              </li> 

                              <li class="nav-item">
                                    <a class="nav-link " id="content_setting_sidebar_tab" data-toggle="pill" href="#content_setting_sidebar" role="tab"
                                    aria-controls="content" aria-selected="false">Setting Sidebar</a>
                              </li> 
                              <li class="nav-item ">
                                    <a class="nav-link " id="content_setting_footer_tab" data-toggle="pill" href="#content_setting_footer" role="tab"
                                    aria-controls="content" aria-selected="false">Setting Footer</a>
                              </li> 
                              <li class="nav-item ">
                                    <a class="nav-link" id="content_section_tab" data-toggle="pill" href="#content_section" role="tab"
                                    aria-controls="content" aria-selected="false">Urutkan Section</a>
                              </li>  
                              <?php
                                    foreach($get_sections_aktif as $section_item){
                                    ?>    
                                    <li class="nav-item <?php echo $blog_mode;?>">
                                          <a class="nav-link" id="content_<?php echo $section_item;?>_tab" data-toggle="pill" href="#content_<?php echo $section_item;?>" role="tab"
                                          aria-controls="content" aria-selected="false">
                                                <?php echo (isset($sections[$section_item]) ? $sections[$section_item] : 'Section Name' );?>
                                          </a>
                                    </li> 
                                    <?php
                                    }
                              ?> 
                        </ul>   
                  </div>
                  <div class="tab-container-content">
                        <div class="tab-content">
                              <div class="tab-pane fade show active" id="content_home">  
                                    <?php include 'view_tab_home.php';?>
                              </div>
                              <div class="tab-pane fade" id="content_section">  
                                    <?php include 'view_tab_sections.php';?>
                              </div> 
                              <div class="tab-pane fade" id="content_setting_sidebar">  
                                    <?php include 'view_tab_setting_sidebar.php';?>
                              </div> 
                              <div class="tab-pane fade" id="content_lokasi_menu">  
                                    <?php include 'view_tab_menu.php';?>
                              </div> 
                              <div class="tab-pane fade" id="content_setting_footer">  
                                    <?php include 'view_tab_setting_footer.php';?>
                              </div> 

                              <?php 
                              /**
                               * untuk sections
                               */ 
                              foreach($get_sections_aktif as $section_item){
                              ?>    
                                    <div class="tab-pane fade" id="content_<?php echo $section_item;?>">  
                                          <?php include 'view_tab_'.$section_item.'.php';?>
                                    </div>
                              <?php
                              }
                              ?>
                        </div>

                  </div>
            </div>
        </div>
    </div>
</div>

<div id="icon-overlay" class="hide">
      <div class="icon-pack">
            <div class="icon-header">
                  <div class="icon-title">
                        Icon Font Awesome
                  </div>
                  <div class="btn-close">
                        <i class="fa fa-times"></i>
                  </div>
            </div>
            <div class="icon-list">            
                  <ul>
                  <?php 
                        $fa_icon = novapage_iconpack();
                        foreach($fa_icon as $icon) {
                              ?>
                              <li class="icon select-icon">
                                    <i class="fa <?php echo $icon;?>"></i> 
                                    <label class="label"><?php echo $icon;?></label>
                              </li>
                              <?php
                        }
                  ?>
                  </ul>
            </div>
      </div>
</div>

<div id="image-overlay" class="hide">
      <div class="image-pack">
            <div class="image-header">
                  <div class="image-title">Asset Gambar</div>
                  <div class="btn-close">
                        <i class="fa fa-times"></i>
                  </div>
            </div>
            <div class="image-list">            
                  <ul>
                  <?php  
                        foreach($get_images as $image) {
                              ?>
                              <li 
                                    class="image select-image" 
                                    data-fileurl ="<?php echo base_url('asset/img_novapage/images/'.$image['file']);?>"
                                    data-file ="<?php echo $image['file'];?>"
                                    >
                                    <img src="<?php echo base_url('asset/img_novapage/images/'.$image['file']);?>" /> 
                              </li>
                              <?php
                        }
                  ?>
                  </ul>
            </div>
      </div>
</div>
<script>

$(function(){  
      if (window.location.hash) {
        var initial_nav = window.location.hash; 

        // deactive tabs
        if($('#novapage-panel .nav-tabs').find('a.nav-link').hasClass('active')){
            $('#novapage-panel .nav-tabs').find('a.nav-link').removeClass('active');
            $('#novapage-panel .nav-tabs').find('a.nav-link').removeClass('show'); 
        }
        
        if($('#novapage-panel .tab-content').find('.tab-pane').hasClass('active')){ 
            $('#novapage-panel .tab-content').find('.tab-pane').removeClass('active');
            $('#novapage-panel .tab-content').find('.tab-pane').removeClass('show');
        }

        // active tab
        $('#novapage-panel .nav-tabs .nav-link'+initial_nav+'_tab').addClass('active');
        $('#novapage-panel .nav-tabs .nav-link'+initial_nav+'_tab').addClass('show');
        $('#novapage-panel .tab-content .tab-pane'+initial_nav).addClass('active');
        $('#novapage-panel .tab-content .tab-pane'+initial_nav).addClass('show'); 

        // side menu, reopen menu 
        $('body div.sidebar ul').find('li.module-novapage').addClass('menu-open');
        $('body div.sidebar ul').find('li.novapage').addClass('menu-open');
        $('body div.sidebar ul').find('li.novapage a').addClass('active');
      } 

      
        // auto remove / hide alert message
        if( $(document).find('#novapage-alert.alert')) {
            $('#novapage-alert.alert').fadeOut(3000,function(){
                //remove it 
                $('#novapage-alert.alert').remove();
            }); 
        }


        $(document).on('click','body .repeatable-control .btn-add-item', function(e){
        e.preventDefault();  
        var template = $(this).data('template');
        var tmpl = $('body #' + template ).html();  
        var context = $(this).closest('div.repeatable-control'); 
        var elementItem = '<li class="dd-item item-section">'+
                              '<div class="dd-handle">'+
                                    '<i class="fa fa-arrows-alt"></i>'+
                              '</div>'+tmpl+
                        '</li>';
        $('.text-info-container .list-item-section', context).append(elementItem);
        reIndexItemList( 
            $('.text-info-container .list-item-section .item', context) , 
            $(this).data('type')
        );        
    });
    
          
    $(document).on('click','body .repeatable-control .item .btn-remove',function(e){
        e.preventDefault();
        var context =$(this).closest('div.repeatable-control');
        $(this).closest('li.item-section').remove();
    });

    var reIndexItemList = function(context ,paramType) {      
        context.find('input,select,textarea').each(function(){              
            var contextItem =  $(this).closest('li.item-section');   
            var itemIndex = contextItem.index();   
            $('.number',contextItem).html( ( itemIndex + 1) );            
            if( $(this).data('item') === 'Y') {
                $(this).attr('name', paramType +'[item]['+itemIndex+']['+ $(this).data('name') +']');
            }  
        });
        
    }

    $(document).on('keyup','body .repeatable-control .item-judul', function(){
        var context = $(this).closest('div.item');
        $('.item-title' , context).html( $(this).val() );
    });

    $(document).on('change','body .repeatable-control .select-item', function(){
        var context = $(this).closest('div.item');
        var txtJudul = 'Info Item';
        if($(this).val() !== '') {
            txtJudul = $(this).children(':selected').text().trim();
        }         
        $('.item-title' , context).html(txtJudul);
        $('.item-judul' , context).val(txtJudul);
    });


    window._imageContainer = {};
    window._iconContainer = {};

    var iconPack = function(){

        if($('body').hasClass('icon-open')) {
            $('body').removeClass('icon-open');
        } else {
            $('body').addClass('icon-open');
        }        
 
        if( $('body #icon-overlay').hasClass('hide') ) {
            $('body #icon-overlay').fadeIn('slow');
            $('body #icon-overlay').removeClass('hide');
        
            if( $('body #icon-overlay li').hasClass('select') ) {
                $('body #icon-overlay li').removeClass('select');
            }

        } else {
            $('body #icon-overlay').fadeOut('slow');
            $('body #icon-overlay').addClass('hide');
        }

    }

    var imagePack = function(){

        if($('body').hasClass('image-open')) {
            $('body').removeClass('image-open');
        } else {
            $('body').addClass('image-open');
        }        

        if( $('body #image-overlay').hasClass('hide') ) {
            $('body #image-overlay').fadeIn('slow');
            $('body #image-overlay').removeClass('hide')
        } else {
            $('body #image-overlay').fadeOut('slow');
            $('body #image-overlay').addClass('hide');
        }

    }
     
    
    /**
     * untuk icon
     */
    $(document).on('click','body .repeatable-control .btn-icon',function(e){
        e.preventDefault();  
        window._iconContainer = $(this);
        iconPack();
    });
    
    $(document).on('click','body .repeatable-control .btn-icon-clear',function(e){
        e.preventDefault();  
        var context = $(this).closest('div.item-icon');
        $('.icon-container',context ).html('<label>Pilih Icon</label>');
        $('.item-icon-text',context ).val('');
    });
    
    $('body').on('click','#icon-overlay .icon-pack .icon-header .btn-close' , function(e){ 
        e.preventDefault();  
        iconPack();
    });


    $('body').on('click','#icon-overlay .icon-list .select-icon', function(e){ 
        e.preventDefault();
        var contextLi = $(this).closest('ul').find('li');
        if( contextLi.hasClass('select') ) {
            contextLi.removeClass('select');
        }
        $(this).addClass('select');
    });

    $('body').on('dblclick','#icon-overlay .icon-list .select-icon', function(e){ 
        e.preventDefault();  
        var iconSelected = $('i',this).attr('class'); 
        $(window._iconContainer).html('<i class="' + iconSelected + '"></i>');
        $(window._iconContainer).closest('div.item-icon').find('.item-icon-text').first().val( iconSelected);
        iconPack();
    });

    

    /**
     * untuk iamge
     */
    $(document).on('click','body .section-control .btn-image',function(e){
        e.preventDefault();  
        window._imageContainer = $(this);
        imagePack();
    });
    
    $(document).on('click','body .section-control .btn-image-clear',function(e){
        e.preventDefault();  
        var context = $(this).closest('div.item-image');
        $('.image-container',context ).html('<label>Pilih Gambar</label>');
        $('.item-image-text',context ).val('');
    });
    
    $('body').on('click','#image-overlay .image-pack .image-header .btn-close' , function(e){ 
        e.preventDefault();  
        imagePack();
    });

    $('body').on('click','#image-overlay .image-list .select-image', function(e){ 
        e.preventDefault();
        var contextLi = $(this).closest('ul').find('li');
        if( contextLi.hasClass('select') ) {
            contextLi.removeClass('select');
        }
        $(this).addClass('select');
    });

    $('body').on('dblclick','#image-overlay .image-list .select-image', function(e){ 
        e.preventDefault();          
        var imageUrlSelected = $(this).data('fileurl'); 
        var imageSelected = $(this).data('file');         
        $(window._imageContainer).html('<img src="'+ imageUrlSelected  +'" />');
        $(window._imageContainer).closest('div.item-image').find('.item-image-text').first().val( imageSelected);
        imagePack();
    });

    $('.repeatable-control #item-section').nestable({ 
            rootClass : 'dd-item-container',
            group: 'item-section',
            maxDepth: 1
    }).on('change',function(e){
            var context = $(this).closest('div.repeatable-control'); 
            reIndexItemList( 
                  $('.text-info-container .list-item-section .item', context) , 
                  $(this).data('type')
            );    
    });

    $(document).on('change','body #novapage-panel .select-link-type', function(e){
            e.preventDefault();          
            $(this).closest('div.select-link').find('.halaman').hide();
            $(this).closest('div.select-link').find('.url').hide();

            if($(this).val() == 'halaman') {
                  $(this).closest('div.select-link').find('.halaman').fadeIn();
            } else {
                  $(this).closest('div.select-link').find('.url').fadeIn();
            }
    });
});
</script>
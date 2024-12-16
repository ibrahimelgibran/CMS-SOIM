<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Mod_Novapage_Images
 * controller ini untuk manajemen images 
 * 
 * module admin
 * 
 * @package novapage
 * @author noor hadi (no3r_hadi@yahoo.com)
 * @license http://opensource.org/licenses/MIT  MIT License
 * 
 * @copyright 2020
 * 
 */


class Mod_Novapage_Images extends CI_Controller {
	public function index(){          
        cek_session_akses('novapage-images',$this->session->id_session);  
         
        if(isset($_POST['set_images'])) {

            /**
             * proses simpan (edit / insert)
             */
            $result = $this->upload_file('file');
            $data = array(
                'deskripsi' => $this->db->escape_str( $this->input->post('deskripsi') )
            );
            if( $result['file_name']) {
                $data = array_merge(
                    $data ,
                    array(
                        'file'=> $result['file_name']
                    )
                );
            }
            $get_id = $this->db->escape_str( $this->input->post('id_edit') );
            $msg = array();
            if( $this->save_data($get_id,$data) ){ 
                $msg['success'] = 'Berhasil Update Images';
                if(empty($get_id)) {
                    $msg['success'] = 'Berhasil Menambahkan Images';
                }
		        
            } else {
                $msg['fail'] = 'Images Tidak Tersimpan';
            } 
            $this->session->set_flashdata('alert', $msg);
            redirect($this->uri->segment(1).'/novapage-images');

        }  elseif(isset($_POST['id_delete'])) {        

            /**
             * proses delete
             */

            $id =  $this->db->escape_str( $this->input->post('id_delete') );
            $msg = array();
            if( $this->delete_data($id)) {
                $msg['success'] = 'Berhasil Hapus Images'; 
            } else {
                $msg['fail'] = 'Images Tidak Terhapus';
            }
            $this->session->set_flashdata('alert', $msg);
            redirect($this->uri->segment(1).'/novapage-images');

        } else {
            $this->view_index(); 
        }
    }

    protected function view_index(){         
        $data['get_images']  = $this->model_app->view_ordering('tbl_novapage_images','deskripsi','ASC') ; 
        $this->template->load('administrator/template','administrator/mod_novapage_image/view_index',$data);
    } 

    /**
     * save_data
     * method ini digunakan untnuk menyimpan images
     * ke table
     */
    protected function save_data($id='',$data = array()) {

        // get data
        $get_data  = $this->model_app->view_where('tbl_novapage_images',array('id_images' => $id ))->row_array(); 

        if( !empty($data) && is_array($data)) { 
            if(!empty($get_data) && $get_data['id_images'] == $id ){  
                // jika beda /ganti maka hapus yang lama
                if(isset($data['file'])) {
                    if( !empty($data['file']) && ($get_data['file'] != $data['file'])) {
                        $this->hapus_file($get_data['file']); 
                    }
                }

                return $this->model_app->update(
                        'tbl_novapage_images', 
                        $data,
                        array(
                            'id_images' => $id
                        )
                    ); 

            } else { 
                return $this->model_app->insert('tbl_novapage_images', $data);
            }
        } else {
            return null;
        }
    }  
    
    /**
     * delete_data
     * method ini digunakan untnuk hapus images
     * ke table
     */
    protected function delete_data($id) { 
        // get data
        $get_data  = $this->model_app->view_where('tbl_novapage_images',array('id_images' => $id ))->row_array();  
        if( !empty($get_data) ) {  

            if(!empty($get_data['file'])) {
                $this->hapus_file($get_data['file']);
            }

            return $this->model_app->delete(
                'tbl_novapage_images',
                array(
                    'id_images' => $id
                )
            );  
        } else {
            return null;
        }
    } 

    /**
     * upload_file
     * untuk upload file
     */
    protected function upload_file($param){

        // config
        $config['upload_path'] = 'asset/img_novapage/images/';
        $config['allowed_types'] = 'jpg|png|JPG';
        $config['max_size'] = '3084'; //kilobyte

        $this->load->library('upload', $config);
        $this->upload->do_upload( $param );

        return $this->upload->data(); 
    }

    /**
     * hapus file
     */
    protected function hapus_file($nama_file = '') {
        // jika ada file hapus
        $file_file = FCPATH .'asset/img_novapage/images/'.$nama_file; 
        if( !empty($nama_file) && file_exists($file_file)) {
            @unlink($file_file);
        }
    }
}
?>
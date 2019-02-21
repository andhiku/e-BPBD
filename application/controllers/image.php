<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends CI_Controller {

    private $name_user;
    private $username;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('login')) :
            redirect(site_url('login'));
            return;
        endif;
        $data_session = $this->session->userdata('login');
        $this->name_user = $data_session['nama_lengkap'];
        $this->username = $data_session['username'];
        $this->load->library('form_validation');
//        $this->load->library(array('session', 'upload', 'encrypt', 'Excel/PHPExcel', 'PHPExcel/IOFactory'));
        $this->load->model(array('image_model'));
    }
    
    function index(){
        $data = array();
        if($this->input->post('submitForm') && !empty($_FILES['upload_Files']['name'])){
            $filesCount = count($_FILES['upload_Files']['name']);
            for($i = 0; $i < $filesCount; $i++){ $_FILES['upload_File']['name'] = $_FILES['upload_Files']['name'][$i]; $_FILES['upload_File']['type'] = $_FILES['upload_Files']['type'][$i]; $_FILES['upload_File']['tmp_name'] = $_FILES['upload_Files']['tmp_name'][$i]; $_FILES['upload_File']['error'] = $_FILES['upload_Files']['error'][$i]; $_FILES['upload_File']['size'] = $_FILES['upload_Files']['size'][$i]; $uploadPath = 'uploads/files/'; $config['upload_path'] = $uploadPath; $config['allowed_types'] = 'gif|jpg|png'; $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('upload_File')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['created'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['modified'] = date("Y-m-d H:i:s");
                }
            }            
            if(!empty($uploadData)){
                //Insert file information into the database
                $insert = $this->files->insert($uploadData);
                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata('statusMsg',$statusMsg);
            }
        }
        //Get files data from database
        $data['gallery'] = $this->files->getRows();
        //Pass the files data to view
        $this->template->view('files_upload/index', $data);
    }

//    public function index() {
//        $this->template->view('setting/image_upload');
//    }

    // add image from form
    public function add_image() {
        $this->form_validation->set_rules('id_bencana','ID Bencana','required');
        if ($this->form_validation->run() != FALSE) {
            $config['upload_path'] = './assets/bencana';
            $config['allowed_types'] = 'gif|jpg|png|pdf|PDF|JPG|PNG|GIF';
            $config['max_size'] = '2048000';
            $config['max_width'] = '20000';
            $config['max_height'] = '20000';
            $config['encrypt_name'] = FALSE;
            // load CI libarary called upload
            $this->load->library('upload', $config);
            // body of if clause will be executed when image uploading is failed
            if (!$this->upload->do_upload()) {
                $errors = array('error' => $this->upload->display_errors());
                // This image is uploaded by deafult if the selected image in not uploaded
                $image = 'no_image.jpg';
            }
            // body of else clause will be executed when image uploading is succeeded
            else {
                $data = array('upload_data' => $this->upload->data());
                $image = $_FILES['userfile']['name'];  //name must be userfile
            }
            $this->image_model->insert_image($image);
            $this->session->set_flashdata('success', 'Image stored');
            redirect('image');
        } else {
            $this->template->view('setting/image_upload');
        }
    }

    // view images fetched from database
    public function view_images() {
        $data['images'] = $this->image_model->get_images();
        $this->load->view('setting/v_foto', $data);
    }

}

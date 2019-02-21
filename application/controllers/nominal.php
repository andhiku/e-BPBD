<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Nominal extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    function index() {
        $this->form_validation->set_rules('nom', 'Nominal', 'required|string');
        if ($this->form_validation->run()) {
            $data['nom'] = $this->input->post('nom', true);
            $data['pecah'] = explode(" ", $data['nom']);
        } else {
            $data['nom'] = 0;
            $data['pecah'] = 0;
        }

        $this->template->view('v_nominal', $data);
    }

}

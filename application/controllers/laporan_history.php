<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_history extends CI_Controller {

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
        $this->load->library(array('session', 'upload', 'encrypt', 'Excel/PHPExcel'));
        $this->load->helper(array('form', 'url', 'html'));
    }

    public function index() {        
        $where = array(
            'id_jenis' => $this->input->get('jenisbencana'),
            'bln' => $this->input->get('bln'),
            'thn' => $this->input->get('thn')
        );

        $page = ($this->input->get('page')) ? $this->input->get('page') : 0;
        $config = pagination_list();
        $config['base_url'] = site_url("laporan_history?jenisbencana={$where['id_jenis']}&thn={$where['thn']}&bln={$where['bln']}");
        $config['per_page'] = 50;
        $config['uri_segment'] = 4;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['total_rows'] = $this->count($where);
        $this->pagination->initialize($config);

        $data = array(
            'title' => 'Laporan History' . DEFAULT_TITLE,
            'jenisbencana' => $this->mbpn->jenis_hak(),
            'data_history' => $this->filtered($where, $config['per_page'], $page)
        );
        $this->template->view('v_laporan_history', $data);
    }

    /**
     * Query Where data history
     *
     * @return string
     * */
    public function filtered(Array $data, $limit = 50, $offset = 0) {
        $this->db->join('tb_jenisbencana', 'tb_bencana.id_jenis = tb_jenisbencana.id_jenis');

        if ($data['id_jenis'] != '')
            $this->db->where('tb_bencana.id_jenis', $data['id_jenis']);
        if ($data['bln'] != '')
            $this->db->where('MONTH(tb_bencana.tanggal)', $data['bln']);
        if ($data['thn'] != '')
            $this->db->where('YEAR(tb_bencana.tanggal)', $data['thn']);
        $this->db->order_by('id_bencana', 'desc');
        $query = $this->db->get('tb_bencana', $limit, $offset);
        return $query->result();
    }

    public function count(Array $data) {
        $this->db->join('tb_jenisbencana', 'tb_bencana.id_jenis = tb_jenisbencana.id_jenis');
        
        if ($data['id_jenis'] != '')
            $this->db->where('tb_bencana.id_jenis', $data['id_jenis']);
        if ($data['bln'] != '')
            $this->db->where('MONTH(tb_bencana.tanggal)', $data['bln']);
        if ($data['thn'] != '')
            $this->db->where('YEAR(tb_bencana.tanggal)', $data['thn']);

        $query = $this->db->get('tb_bencana');
        return $query->num_rows();
    }

    /**
     * Menampilkan Cetak Data History
     *
     * @return pages print
     * */
    public function cetak() {
        $data = array(
            'id_jenis' => $this->input->get('jenisbencana'),
            'id_kecamatan' => $this->input->get('kecamatan'),
            'id_desa' => $this->input->get('desa'),
            'bln' => $this->input->get('bln'),
            'thn' => $this->input->get('thn')
        );

        $this->db->join('tb_jenisbencana', 'tb_bencana.id_jenis = tb_jenisbencana.id_jenis');
        $this->db->join('tb_kecamatan', 'tb_bencana.id_kecamatan = tb_kecamatan.id_kecamatan');
        $this->db->join('tb_desa', 'tb_bencana.id_desa = tb_desa.id_desa');

        if ($data['id_jenis'] != '')
            $this->db->where('tb_bencana.id_jenis', $data['id_jenis']);
        if ($data['id_kecamatan'] != '')
            $this->db->where('tb_bencana.id_kecamatan', $data['id_kecamatan']);
        if ($data['id_desa'] != '')
            $this->db->where('tb_bencana.id_desa', $data['id_desa']);
        if ($data['bln'] != '')
            $this->db->where('MONTH(tb_bencana.tanggal)', $data['bln']);
        if ($data['thn'] != '')
            $this->db->where('YEAR(tb_bencana.tanggal)', $data['thn']);

        $query = $this->db->get('tb_bencana');

        $data_history = array(
            'data_loop' => $query->result(),
        );

        $this->load->view('app-html/cetak_history', $data_history);
    }

}

/* End of file Laporan_history.php */
/* Location: ./application/controllers/Laporan_history.php */
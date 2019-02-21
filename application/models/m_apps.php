<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_apps extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    function login($username, $password) {
        $this->load->database();
        $this->db->select('id,username,nama_lengkap,pass_login,foto,level_akses');
        $this->db->from('tb_users');
        $this->db->where('username', $username);
        $this->db->where('pass_login', $password);
        $this->db->where('status_user', 'valid');
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }

    function get_Databyfield($field, $tbl) {
        $this->db->select($field);
        $this->db->from($tbl);
        $result = $this->db->get();
        return $result; //->result_array();
    }

    function add_save($tbl, $data) {
        $this->db->insert($tbl, $data);
        return;
    }

    function add_multisaveid($tbl, $data) {
        $this->db->insert($tbl, $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

    function getwhere($tbl = null, $kondisi = null) {
        $query = $this->db->get_where($tbl, $kondisi);
        return $query;
    }

    function getmultidatabyid($tbl, $field, $id = 0) {
        if ($id === 0) {
            $query = $this->db->get($tbl);
            return $query->result_array();
        }
        $query = $this->db->get_where($tbl, array($field => $id));
        return $query->row_array();
    }

    function get_data_tabel($tbl = null) {
        $result = $this->db->get($tbl);
        return $result->result_array();
    }

    function getDataTabel($tbl = null, $kondisi = null) {
        $this->db->where($kondisi);
        $result = $this->db->get($tbl);
        return $result->result_array();
    }

    function getDataMultiTable($field, $tbl1 = null, $tbl2 = null, $kondisi = null) {
        $this->db->select($field);
        $this->db->from($tbl2);
        $this->db->join($tbl1, $kondisi, 'inner');
        $result = $this->db->get();
        return $result->result_array();
    }

    function GetDataRandom($tbl = null) {
        $this->db->order_by('id', 'RANDOM');
        $result = $this->db->get($tbl);
        return $result->result_array();
    }

    function data_update($tbl, $kondisi, $data) {
        $this->db->where($kondisi);
        $this->db->update($tbl, $data);
        return;
    }

    function hapus_data($tbl, $kondisi) {
        $this->db->where($kondisi);
        $this->db->delete($tbl);
        return;
    }

    function recTotal($tbl = null, $kondisi = null) {
        if ($kondisi != null) {
            $this->db->where($kondisi);
        }
        $query = $this->db->get($tbl);
        return $query->num_rows();
    }

    //rekap include 
    function rekService() {
        $this->db->select("jenis, COUNT(jenis) as jml, "
                . "SUM(CASE WHEN stts = '0' then 1 else 0 end )  as pr0, "
                . "SUM(CASE WHEN stts = '1' then 1 else 0 end )  as pr1, "
                . "SUM(CASE WHEN stts = '2' then 1 else 0 end )  as pr2, "
                . "SUM(CASE WHEN stts = '3' then 1 else 0 end )  as pr3, "
                . "SUM(CASE WHEN stts = '4' then 1 else 0 end )  as pr4, "
                . "SUM(CASE WHEN stts = '5' then 1 else 0 end )  as pr5, "
                . "SUM(CASE WHEN stts = '6' then 1 else 0 end )  as pr6, "
                . "SUM(CASE WHEN stts = '7' then 1 else 0 end )  as pr7, "
                . "SUM(CASE WHEN stts = '8' then 1 else 0 end )  as pr8, "
                . "SUM(CASE WHEN stts = '9' then 1 else 0 end )  as pr9, "
                . "SUM(CASE WHEN stts = '88' then 1 else 0 end )  as btl, "
                . "SUM(CASE WHEN stts = '99' then 1 else 0 end )  as sls, ", false);
        $this->db->from('layanan_tb');
        //$this->db->join('tp_jabatan', 'tp_identitas.NIP = tp_jabatan.NIP');
        //$this->db->where('tp_identitas.KSTAPEG in ("1","2")');
        //$this->db->where('tp_identitas.KDUKPNS in ("01","04")');
        $this->db->group_by('jenis');
        $this->db->order_by('jenis', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    function getJadwalTerdaftar() {
        $this->db->select('*');
        $this->db->from('layanan_tb');
        $this->db->where('lastsms < now() - INTERVAL 24 HOUR');
        $this->db->where('stts !=', '99');
        $this->db->where('keterangan =', 'TERDAFTAR');
        $result = $this->db->get();
        return $result; //->result_array();
        //'SELECT * FROM layanan_tb WHERE lastsms >= now() - INTERVAL 1 DAY and stts != 99 group by id'
    }

    function getJadwal() {
        $this->db->select('*');
        $this->db->from('layanan_tb');
        $this->db->where('lastsms < now() - INTERVAL 24 HOUR');
        $this->db->where('stts !=', '99');
        $result = $this->db->get();
        return $result;
    }

    function getJadwalKosong($field1) {
        $this->db->select($field1);
        $this->db->from('layanan_tb');
        $this->db->where('lastsms = 0');
        $this->db->where('stts !=', '99');
        $result = $this->db->get();
        return $result; //return $result;->result_array(); --result array menampilkan semua data pada echo json_encode
    }

    function setLastSms($idx) {
        $now = date('Y-m-d H:i:s');
        $this->db->set('lastsms', $now);
        $this->db->where('id', $idx);
        $this->db->update('layanan_tb');
    }

    function getData($field, $tbl, $kondisi) {
        $this->db->select($field);
        $this->db->from($tbl);
        $this->db->where($kondisi);
        $result = $this->db->get();
        return $result;
    }

    function kecamatan() {
        $query = $this->db->get('tb_kecamatan');
        return $query->result();
    }

    function desa($id) {
        $this->db->where('id_kecamatan', $id);
        $query = $this->db->get('tb_desa');
        return $query->result();
    }

    function foto($id) {
        $this->db->where('id_bencana', $id);
        $query = $this->db->get('tb_foto');
        return $query->result();
    }

    function tim() {
        $query = $this->db->get('tb_tim');
        return $query->result();
    }

    function lemari() {
        $query = $this->db->get('tb_lemari');
        return $query->result();
    }

    function getLemari($id) {
        $this->db->where('no_lemari', $id);
        $query = $this->db->get('tb_lemari');
        return $query->result();
    }

    function rak($id) {
        $this->db->where('no_lemari', $id);
        $query = $this->db->get('tb_rak');
        return $query->result();
    }

    function getRak($id) {
        $this->db->where('no_rak', $id);
        $query = $this->db->get('tb_rak');
        return $query->result();
    }

    function album($id) {
        $this->db->where('no_rak', $id);
        $query = $this->db->get('tb_album');
        return $query->result();
    }

    function getAlbum($id) {
        $this->db->where('no_album', $id);
        $query = $this->db->get('tb_album');
        return $query->result();
    }

    function laman($id) {
        $this->db->where('no_album', $id);
        $query = $this->db->get('tb_halaman');
        return $query->result();
    }

    function halaman_tampil($id) {
        $this->db->where('tb_penyimpanan.no_album', $id);
        $query = $this->db->get('tb_halaman');
        return $query->result();
    }

    function cek_ketersediaan($id, $i) {
        $this->db->where('no_album', $id);
        $this->db->where('no_halaman', $i);
        $query = $this->db->get('tb_penyimpanan');
        return $query->result();
    }

    function get_jenisHak($id) {
        $this->db->where('id_hak', $id);
        $query = $this->db->get('tb_hak_milik');
        return $query->result();
    }

    function get_jenisBencana($id) {
        $this->db->where('id_jenis', $id);
        $query = $this->db->get('tb_jenisbencana');
        return $query->result();
    }

    function get_jenisTim($id) {
        $this->db->where('id_tim', $id);
        $query = $this->db->get('tb_tim');
        return $query->result();
    }

    function get_kecamatan($id) {
        $this->db->where('id_kecamatan', $id);
        $query = $this->db->get('tb_kecamatan');
        return $query->result();
    }

    function get_desa($id) {
        $this->db->where('id_desa', $id);
        $query = $this->db->get('tb_desa');
        return $query->result();
    }

    function get_foto($id) {
        $this->db->where('id_foto', $id);
        $query = $this->db->get('tb_foto');
        return $query->result();
    }

    function getbukuPending() {
        $this->db->where('status_entry', 'N');
        $query = $this->db->get('tb_buku_tanah');
        return $query->result();
    }

    function numbukuPending() {
        $this->db->where('status_entry', 'N');
        $query = $this->db->get('tb_buku_tanah');
        return $query->num_rows();
    }

    function getwarkahPending() {
        $this->db->where('status_entry', 'N');
        $query = $this->db->get('tb_warkah');
        return $query->result();
    }

    function numwarkahPending() {
        $this->db->where('status_entry', 'N');
        $query = $this->db->get('tb_warkah');
        return $query->num_rows();
    }

    function unggah($image, $id_bencana) {
        $query_id = $this->db->query("SELECT MAX(id_foto) AS id_foto FROM tb_foto")->row();
        $ambil_id = ++$query_id->id_foto;
        $id_foto = $ambil_id + $this->input->post('id_foto');
        $data = array(
            'id_foto' => $id_foto,
            'id_bencana' => $id_bencana,
            'foto' => $image
        );
        $this->db->insert('tb_foto', $data);
    }

}

/* End of file m_dashboard.php */
    /* Location: ./application/modules/dashboard/models/m_dashboard.php */    
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Halaman Index Aplikasi
 *
 * @access http://example_root/utama
 * @package Class Utama.php
 * @author https://facebook.com/muh.azzain
 **/
class Utama extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		if ( ! $this->session->userdata('login') ) :
			redirect(site_url('login'));
			return;
		endif;
        $this->load->model(array('m_apps','m_users','m_presentation'));
        $this->load->library(array('session','table'));
        $this->load->helper('color_helper');
    }
	public function index()
	{
		$data = array(
			'title' => 'Halaman Utama'.DEFAULT_TITLE, 
			//'history' => $this->m_users->getHistoryLimit($this->session->userdata('login')['username']),
		);
		$this->template->view('v_utama', $data);	
	}
	public function get_document( )
	{
		/**
		 * Menampilkan Data Diagram Batang (Indeks Dokument)
		 *
		 * @return string (Object) // Liat Hasil buka program ini dengan JSON_PRETTY_PRINT
		 **/
		$tahun = (int)date('Y') - 4;
		$output = array(
			'labels' => array(),
		);
		for($i=$tahun; $i<=date('Y'); $i++) {  
			$output['labels'][] = $i;
		}
		$output['datasets'] = array( 
			array(
				'fillColor' => '#D0A711',
				'data' => array()
			)
		);
		for($b=$tahun; $b<=date('Y'); $b++) {
			$output['datasets'][0]['data'][] = $this->m_presentation->getBencana_tahun($b);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
//	public function get_tanggungan( )
//	{
//		/**
//		 * Menampilkan Data Diagram Batang (Indeks Dokument)
//		 *
//		 * @return string (Object) // Liat Hasil buka program ini dengan JSON_PRETTY_PRINT
//		 **/
///*		$tahun = (int)date('Y') - 4;
//		$output = array(
//			'labels' => array(),
//		);
//		for($i=$tahun; $i<=date('Y'); $i++) {  
//			$output['labels'][] = $i;
//		}
//		$output['datasets'] = array( 
//			array(
//				'fillColor' => '#68768A',
//				'data' => array(),
//				'tooltipTemplate' => array()
//			)
//		);
//		for($b=$tahun; $b<=date('Y'); $b++) {  
//			$output['datasets'][0]['data'][] = $this->m_presentation->tanggungan_tahun($b);
//			$output['datasets'][0]['tooltip'][] = "<%= datasetLabel %>";
//		}*/
//		$tahun = (int)date('Y') - 4;
//		$output = array(
//			'element' => 'line-chart',
//			'resize' => true,
//			'data' => array(),
//			'xkey' => 'y',
//			'ykeys'=> array('jumlah'),
//			'labels' => array('Jumlah'),
//			'lineColors' => array('#D0A711'),
//			'hideHover' => 'auto'
//		);
//		$angka = 1;
//		for($i=$tahun; $i<=date('Y'); $i++) {  
//			$output['data'][] = array(
//				'y' => "{$i}",
//				'jumlah' => $this->m_presentation->tanggungan_tahun($i)
//			);
//		}
//		$this->output->set_content_type('application/json')->set_output(json_encode($output, JSON_PRETTY_PRINT));
//	}
	public function get_districts()
	{
		/**
		 * Menampilkan Data Kecamatan pada Daigram Pie
		 *
		 * @return string (Object) // Liat Hasil buka program ini dengan JSON_PRETTY_PRINT
		 **/
		$output = array();
		$no=9;
		foreach ($this->m_apps->kecamatan() as $row) :
			if($row->id_kecamatan==7) : continue; endif;
			$output[] = array(
				'value' => $this->m_presentation->getDok_wilayah($row->id_kecamatan),
				'color' => colorChart($row->id_kecamatan),
				'highlight' => colorChart(--$no),
				'label' => $row->nama_kecamatan,
			);
		endforeach;
		$this->output->set_content_type('application/json')->set_output(json_encode($output, JSON_PRETTY_PRINT)); 
	}
	public function get_warrant()
	{
		/**
		 * Menampilkan Data Jenis Bencana pada Diagram Pie
		 *
		 * @return String (Object) // Liat Hasil buka program ini dengan JSON_PRETTY_PRINT
		 **/
		$output = array();
		$no = 9;
		foreach ($this->mbpn->jenis_hak() as $row) :
			if($row->id_jenis == 5) : continue; endif;
			$output[] = array(
				'value' => $this->m_presentation->numJenisbencana($row->id_jenis),
				'color' => colorChart($row->id_jenis),
				'highlight' => colorChart(--$no),
				'label' => $row->jenis_bencana,
			);
		endforeach;
		$this->output->set_content_type('application/json')->set_output(json_encode($output)); 
	}
}

/* End of file Utama.php */
/* Location: ./application/controllers/Utama.php */
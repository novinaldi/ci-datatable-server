<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') == TRUE && $this->session->userdata('idlevel') == 1) {
            $this->load->model('Modelproduk', 'produk');
            return true;
        } else {
            redirect('login/keluar', 'refresh');
        }
    }
    public function index()
    {
        $parser = array(
            'menu' => $this->load->view('home/menu', '', true),
            'judul' => 'Manajemen Data Produk',
            'isi' => $this->load->view('produk/view', '', true),
        );
        $this->parser->parse('home/layout', $parser);
    }

    function ambildata()
    {
        if ($this->input->is_ajax_request() == TRUE) {
            $list = $this->produk->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $field->katnama;
                $row[] = '';
                $row[] = '';
                $row[] = '';
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->produk->count_all(),
                "recordsFiltered" => $this->produk->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('data tidak bisa dieksekusi');
        }
    }
}
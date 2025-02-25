<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        check_login_session();
        $this->load->model('sale_m', 'sale');
	}
    
	public function sale()
	{
        $this->load->model('customer_m', 'customer');
        $this->load->library('pagination');

        if(isset($_POST['reset'])) {
            $this->session->unset_userdata('search');
        }

        if(isset($_POST['filter'])) {
            $post = $this->input->post(null, TRUE);
            $this->session->set_userdata('search', $post);
        } else {
            $post = $this->session->userdata('search');
        }

		$config['base_url'] = site_url('report/sale');
		$config['uri_segment'] = 3; 
		$config['total_rows'] = $this->sale->get_sale_pagination()->num_rows();
		$config['per_page'] = 3;
		$config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $data['title'] = 'Sales Report';
        $data['pagination'] = $this->pagination->create_links();
        $data['customer'] = $this->customer->get()->result();
        $data['row'] = $this->sale->get_sale_pagination($config['per_page'], $this->uri->segment(3), $post['date1'], $post['date2'], $post['customer'], $post['invoice']);
        $data['post'] = $post;

		$this->template->load('_template', 'report/sale_report', $data);
    }

    public function sale_product($sale_id = null) {
        $detail = $this->sale->get_sale_detail($sale_id)->result();
        echo json_encode($detail);
    }

    public function get_search() {
        $periode_awal = $this->input->post('periode_awal');
        $periode_akhir = $this->input->post('periode_akhir');
        $customer = $this->input->post('customer');
        $invoice = $this->input->post('invoice');

        $sale = $this->sale->get_report_sale($periode_awal, $periode_akhir, $customer, $invoice)->result();
        echo json_encode($sale);
    }

}

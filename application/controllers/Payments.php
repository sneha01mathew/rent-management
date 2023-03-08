<?php 
defined('BASEPATH') OR exit('No direct script allowed');

class Payments extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('PaymentsM');
	}

	public function index(){

		$data['payment_details'] = $this->PaymentsM->get_payment();
		$data['tenants'] = $this->PaymentsM->get_tenant_name();
		$this->load->view('Payments/paymentview',$data);
	}

	public function new_entry(){

		$data['tenants'] = $this->PaymentsM->get_tenant_name_dropdown();
		$this->load->view('Payments/manage_payment',$data);
		
	}

	public function add_new_entry(){

		$tenant_id = $_POST['tenant_id'];
		// $month = $_POST['month'];
		$invoice = $_POST['invoice'];
		$amount = $_POST['amount'];

		$this->PaymentsM->insert_new_payment($tenant_id,$invoice,$amount);

		redirect(base_url('Payments'));
	}
}

?>
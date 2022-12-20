<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Booking_Controller extends CI_Controller {
	function __construct() {        
		parent::__construct();

		$this->load->model('Booking_Model','bm');
	}

	public function index(){
		$result['roomData'] = $this->bm->fetchRoomData();
		$result['customerData'] = $this->bm->fetchCustomerData();
		$this->load->view('booking_add_page',$result);		
	}


	public function getBookingData(){
		$result['bookingData'] = $this->bm->fetchBookingData();
		/*var_dump($result);exit();*/
		$this->load->view('booking_list_page',$result);
	}

	public function getRoomDetails(){
		$roomId = $this->input->post('roomId');
		$result = $this->bm->getRoomDetails($roomId);
		echo json_encode($result);
		exit;
	}

	public function getCustomerDetails(){
		$customerId = $this->input->post('customerId');
		$result = $this->bm->getCustomerDetails($customerId);
		echo json_encode($result);
		exit;
	}

	public function bookingUpSet(){
		$data['room_id'] =	$_POST['room_id'];
		$data['customer_id'] = $_POST['customer_id'];
		$data['no_of_days'] = $_POST['no_of_days'];
		$data['no_of_people'] = $_POST['no_of_people'];
		$data['book_end_date'] = date('Y-m-d',strtotime($_POST['book_end_date']));
		$data['booking_payment'] = $_POST['booking_payment'];
		$data['amount'] = $_POST['amount'];
		$data['payment_date'] = date('Y-m-d',strtotime($_POST['payment_date']));
		$this->bm->insertBookingData($data);
		$this->session->set_flashdata('success','Insert Successfully');
		redirect('Booking_Controller/getBookingData');
	}
	
	public function editBookingData($id){
		$record['editRecods'] = $this->bm->editBookingdata($id);
		$record['roomData'] = $this->bm->fetchRoomData();
		$record['customerData'] = $this->bm->fetchCustomerData();
		$this->load->view('booking_add_page',$record);

	}

	public function deleteBookingData($id){
		$delete = $this->bm->deleteBookingData($id);
		if($delete){
			$this->session->set_flashdata('success','Record Delete successfully');
			redirect('Booking_Controller/getBookingData');
		}else{
			$this->session->set_flashdata('error','Record Delete failed...');
			redirect('Booking_Controller/getBookingData');
		}
	}	

}
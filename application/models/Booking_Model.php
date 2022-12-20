<?php 
	
	class Booking_Model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		public function fetchRoomData(){	
    		$query = $this->db->get("rooms");
   			return $query->result();
		}

		public function fetchCustomerData(){
			$query = $this->db->get("customers");
   			return $query->result();
		}

		public function getRoomDetails($id){
			$this->db->select('room_id')
				->from('rooms')
				->where("room_id", $id);
				$query = $this->db->get();
				return $query->row();
		}

		public function getCustomerDetails($customerId){
			$this->db->select('customer_id,name')
				->from('customers')
				->where("customer_id", $customerId);
				$query = $this->db->get();
				return $query->row();
		}

		public function insertBookingData($data){
			$result = $this->db->insert('booking',$data); 
			if($result){
				return true;
			}else{
				return false;
			}
		}

		public function fetchBookingData(){
			$this->db->select('b.*,c.customer_id,name');
			$this->db->join('customers c', 'c.customer_id = b.customer_id');
			$query = $this->db->get("booking b");
			return $query->result();
		}

		public function editBookingdata($id){ 
			$this->db->select('b.*,c.customer_id,name');
			$this->db->join('customers c', 'c.customer_id = b.customer_id');
			$this->db->where("booking_id", $id);
			$query = $this->db->get("booking b");
			return $query->row();
		}

		public function deleteBookingData($id){
			$this->db-> where('booking_id', $id);
    		return $this->db->delete('booking');
		}
		
	}
?>
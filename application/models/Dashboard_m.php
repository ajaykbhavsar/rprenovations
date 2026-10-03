<?php
class dashboard_m extends CI_Model
{
	// Get Total Amount
	function time_in()
	{
		$charid = strtoupper(md5(uniqid(rand(), true)));
		$hyphen = chr(45);// "-"
		$uniqueid = substr($charid, 0, 8).$hyphen
		 .substr($charid, 8, 4).$hyphen
		 .substr($charid,12, 4).$hyphen
		 .substr($charid,16, 4).$hyphen
		 .substr($charid,20,12);
		// Set the new timezone
        date_default_timezone_set('Asia/Kolkata');
        $time = date('H:i:s');
        
        //echo $date;
         $userid=  $this->session->userdata('userid');
         $loginname=  $this->session->userdata('loginname');                     
		$data=array(
			'is_login'=> '1',
			'uniqueid'=>$uniqueid,
			'user_id'=> $userid,
			'employee_name'=> ucwords($loginname),
			'time_in'=> $time,
			'created_date'=>date('Y-m-d'),
		);
		$this->db->INSERT('tbl_attendance',$data);
	}

	function time_out($id)
	{


		$currentdate = date('Y-m-d');

		//Set the new timezone
       date_default_timezone_set('Asia/Kolkata');
       // $time = date('Y-m-d h:i a');
        $time = date('H:i:s');
        //print_r($time);die;
         $userid=  $this->session->userdata('userid');
         $loginname=  $this->session->userdata('loginname');                     
		$data=array(
			'is_login'=> '2',
			'time_out'=> $time,
			'created_date'=>date('Y-m-d'),
		);
		$this->db->WHERE('id',$id);
		$this->db->UPDATE('tbl_attendance', $data);

		$this->db->SELECT("time_in,time_out");
		$this->db->WHERE("created_date>=",$currentdate);
		$this->db->WHERE("id",$id);
		$this->db->FROM("tbl_attendance");
		$Q = $this->db->GET();
		$row= $Q->row_array();


		$dteStart = new DateTime($row['time_in']);
		
		//$dteStart = date("h:i a", strtotime($row['time_in']));
   		 $dteEnd   = new DateTime($row['time_out']);
		//$dteEnd   = date("h:i:a", strtotime($row['time_out']));
   		$dteDiff  = $dteEnd->diff($dteStart);
   		$hours= $dteDiff->format("%H:%I:%S");
		$data1=array(
			'total_hours'=>$hours,
		);
		$this->db->WHERE('id',$id);
		$id=$this->db->UPDATE('tbl_attendance', $data1);
	}

	

	function get_logintime(){
		$currentdate = date('Y-m-d'); 
		$this->db->SELECT("id,time_in,time_out,is_login,user_id");
		$this->db->WHERE("created_date>=",$currentdate);
		$this->db->WHERE("user_id ", $this->session->userdata('userid'));
		$this->db->FROM("tbl_attendance");
		$Q = $this->db->GET();
		return $Q->row_array();
	}
	
}
?>
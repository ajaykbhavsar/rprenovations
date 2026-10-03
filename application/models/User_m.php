<?php
class user_m extends CI_Model
{
	protected $_table_name = 'users';
	protected $_order_by = 'name';
	public $rules = array(
		'username' => array(
			'field' => 'username', 
			'label' => 'username', 
			'rules' => 'trim'
		), 
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim'
		)
	);

	function __construct ()
	{
		parent::__construct();
	}

	// Log in
	public function login ()
	{		
		$this->db->select('*');
		$this->db->where('username',$this->input->post('username'));
		$this->db->where('password', $this->hash($this->input->post('password')));
		$this->db->limit(1);
		$Q = $this->db->get('users');
		if ($Q->num_rows() > 0)
		{
			$user = $Q->row_array();
			// Log in user
			$adminsignindata = array(
				'loginname' => $user["name"],
				'adminusername' => $user["username"],
				'userid' => $user["id"],
				'role_id' => $user["role_id"],
				'adminuserid' => $user["uniqueid"],
				'loggedin' => TRUE,
			);

			// Array store in session
			$this->session->set_userdata($adminsignindata);

			$u = $this->input->post('username');
			$pw = $this->input->post('password');
		
			$chklogin = $this->input->post('chklogin');
		
			if(isset($chklogin) && ($chklogin) == "yes")
			{
				setcookie("cookchk", $chklogin, time()+60*60*24*100, "/");
				setcookie("cookname", $u, time()+60*60*24*100, "/");
				setcookie("cookpass", $pw, time()+60*60*24*100, "/");
			}
			else
			{
				setcookie("cookchk","", time() - 3600, "/");
				setcookie("cookname", "", time() - 3600, "/");
				setcookie("cookpass", "", time() - 3600, "/");				
			}
		}
	}

	function checkcurrentpassword()
	{
		$currentpassword = $this->hash($_POST['currentpassword']);
		$Q = $this->db->query('SELECT password FROM users where password="'.$currentpassword.'" and id="'.$this->session->userdata('userid').'"');
		if ($Q->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function change_password()
	{
		$data = array( 
			'password'=>$this->hash($_POST['newpassword']),
		);

		$this->db->where('id',$this->session->userdata('userid'));
		$this->db->update('users',$data);
		return true;
	}

	// Sign out
	public function signout ()
	{
		// Remove array from session
		$adminsignindata = array('loginname','adminusername','userid','role_id','loggedin');
		$this->session->unset_userdata($adminsignindata);
	}

	// Check log in
	public function loggedin ()
	{
		return (bool) $this->session->userdata('loggedin');
	}

	// Password encryption/decryption
	public function hash ($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}
}
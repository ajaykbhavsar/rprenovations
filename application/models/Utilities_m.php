<?php
class Utilities_m extends CI_Model
{
	function sendMail($from,$name,$to,$cc,$subject,$body,$attach)
	{
		require_once('PHPMailerAutoload.php');
		$mail = new PHPMailer();

		$mail->SMTPOptions = $this->config->item('SMTPOptions');
		$mail->IsSMTP();
		$mail->SMTPAuth = $this->config->item('SMTPAuth');
		$mail->SMTPSecure = $this->config->item('SMTPSecure');
		$mail->Host = $this->config->item('Host');
		$mail->Port = $this->config->item('Port');
		$mail->Username = $this->config->item('Username');
		$mail->Password = $this->config->item('Password');
		//$mail->Host = "localhost";
		//$mail->Port = 25;
		$mail->Subject = $subject;
		$mail->SetFrom($from,$name);
		$mail->MsgHTML($body);
		$mail->isHTML(true);
		
		if($attach!="")
		{	
			$mail->AddAttachment($attach);
		}

		if($to != "")
		{
			$mail->AddAddress($to);
		}

		/*foreach($to as $email)
		{ 
		   $mail->AddAddress($email);
		}*/

		if($cc != "")
		{
			$mail->AddCC($cc);
		}

		/*foreach($cc as $email)
		{
		   $mail->AddCC($email);
		}*/

		if(!$mail->Send()) 
		{
			$mail_status = "Mailer Error: " . $mail->ErrorInfo;
			return false;
		}
		else
		{
			$mail_status = 1;
			return true;
		}
	}

	function attachment($file)
	{
		if($file != "")
		{
			foreach($_FILES as $key=>$value)
			{
				$path = './userfiles/'.$key.'/';
				if(!is_dir($path)) 
				{
					mkdir($path, 0777, TRUE);
				}
				$config['upload_path'] = $path;
				$config['allowed_types'] = 'pdf|doc|docx';
				$config['max_size'] = "10000";
				$config['remove_spaces'] = true;
				$config['overwrite'] = false;
				$config['encrypt_name'] = false;
				$this->load->library('upload');
				$this->upload->initialize($config); 	
				
				if (!$this->upload->do_upload($key))
				{
					$error = array('warning' =>  $this->upload->display_errors());
					$this->session->set_flashdata('error',($error['warning']));					
					redirect($_SERVER['HTTP_REFERER'],'refresh');				
				}
				else
				{

					$image = $this->upload->data();

					$attach = FCPATH.$path.$image['file_name'];

					return $attach;
				}
			}
		}
		else
		{
			return '';
		}
	}
}
?>
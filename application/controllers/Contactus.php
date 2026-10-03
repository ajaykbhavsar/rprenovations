<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contactus extends Front_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['main'] = 'contactus';
        $data['websitepagename'] = 'contactus';
        $this->load->vars($data);
        $this->load->view('template/innermaster');
    }

    function sendmail()
    {
        // Check if it's a POST request
        if ($this->input->server('REQUEST_METHOD') !== 'POST') {
            redirect('contactus', 'refresh');
            return;
        }

        // Basic required field check
        if (empty($this->input->post('txtemail'))) {
            $this->session->set_flashdata('error', 'Please fill in all required fields.');
            redirect('contactus', 'refresh');
            return;
        }

        // Verify reCAPTCHA
        $recaptcha_response = $this->input->post('recaptchaResponse', TRUE);
        
        if (empty($recaptcha_response)) {
            $this->session->set_flashdata('error', 'Please complete the reCAPTCHA verification.');
            redirect('contactus', 'refresh');
            return;
        }

        $recaptcha_secret = "6Ldrc5QtAAAAANcuudsJQPUwWo55Ja2M_ENR0o5u";
        $recaptcha_url = "https://www.google.com/recaptcha/api/siteverify";

        $recaptcha_data = array(
            'secret' => $recaptcha_secret,
            'response' => $recaptcha_response,
            'remoteip' => $this->input->ip_address()
        );

        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($recaptcha_data),
                'timeout' => 10
            )
        );

        $context = stream_context_create($options);
        $verify_response = @file_get_contents($recaptcha_url, false, $context);

        if ($verify_response === FALSE) {
            log_message('error', 'reCAPTCHA verification failed - unable to connect');
            $this->session->set_flashdata('error', 'Unable to verify reCAPTCHA. Please try again.');
            redirect('contactus', 'refresh');
            return;
        }

        $response_data = json_decode($verify_response, true);
        
        log_message('debug', 'reCAPTCHA response: ' . $verify_response);

        // Check reCAPTCHA success
        if (!isset($response_data['success']) || $response_data['success'] !== true) {
            log_message('error', 'reCAPTCHA verification failed: ' . json_encode($response_data));
            $this->session->set_flashdata('error', 'reCAPTCHA verification failed. Please try again.');
            redirect('contactus', 'refresh');
            return;
        }

        // Optional: Check score for v3 (threshold: 0.5)
        if (isset($response_data['score']) && $response_data['score'] < 0.5) {
            log_message('warning', 'reCAPTCHA score too low: ' . $response_data['score']);
            $this->session->set_flashdata('error', 'Suspicious activity detected. Please try again.');
            redirect('contactus', 'refresh');
            return;
        }

        // reCAPTCHA verified successfully - proceed with email
        try {
            $from = $this->input->post('txtemail', TRUE);
            $name = ucfirst($this->input->post('txtfname', TRUE)) . ' ' . ucfirst($this->input->post('txtlname', TRUE));
            $to = $this->config->item('toemailaddress');
            $cc = '';
            $bcc = '';
            $subject = "Contact Detail from Website";
            $attach = "";

            // Handle file upload if exists
            if (!empty($_FILES['document']['name'])) {
                $attach = $this->utilities_m->attachment($_FILES['document']['name']);
            }

            // Prepare sanitized POST data for email template
            $email_data = array(
                'txtfname' => $this->input->post('txtfname', TRUE),
                'txtlname' => $this->input->post('txtlname', TRUE),
                'txtemail' => $this->input->post('txtemail', TRUE),
                'txtphone' => $this->input->post('txtphone', TRUE),
                'txtlocation' => $this->input->post('txtlocation', TRUE),
                'txtmessage' => $this->input->post('txtmessage', TRUE),
                'heading_V' => 'Contact Details',
                'footer_V' => 'RP Renovations & Custom Builds Inc.. All Rights Reserved.'
            );

            $body = $this->load->view('email_templates/contact', $email_data, true);

            log_message('debug', 'Contact email body: ' . PHP_EOL . $body);

            // Debug mode
            if ($this->input->get('debug') == 1) {
                echo $body;
                die;
            }

            $flag = $this->utilities_m->sendMail($from, $name, $to, $cc, $subject, $body, $attach, $bcc);

            // Clean up attachment
            if (!empty($attach) && file_exists($attach)) {
                unlink($attach);
            }

            if ($flag == true) {
                $this->session->set_flashdata('message', 'Thanks for your contact. We will get back to you soon.');
            } else {
                log_message('error', 'Email sending failed');
                $this->session->set_flashdata('error', 'Something went wrong. Please try again later!');
            }

        } catch (Exception $e) {
            log_message('error', 'Contact form error: ' . $e->getMessage());
            
            // Clean up attachment on error
            if (!empty($attach) && file_exists($attach)) {
                unlink($attach);
            }
            
            $this->session->set_flashdata('error', 'An error occurred. Please try again later.');
        }

        redirect('contactus', 'refresh');
    }
}

/* End of file Contactus.php */
/* Location: ./application/controllers/Contactus.php */
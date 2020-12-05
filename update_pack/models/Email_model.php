<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function password_reset_email($new_password = '' , $email = '')
	{
		$query = $this->db->get_where('user' , array('email' => $email));
		if($query->num_rows() > 0)
		{

			$email_msg	=	"Your password has been changed.";
			$email_msg	.=	"Your new password is : ".$new_password."<br />";

			$email_sub	=	"Password reset request";
			$email_to	=	$email;

			$this->send_smtp_mail($email_msg , $email_sub , $email_to);
			return true;
		}
		else
		{
			return false;
		}
	}

	public function send_email_verification_mail($to = "", $verification_code = "") {
		$redirect_url = site_url('login/verify_email_address/'.$verification_code);
		$subject 		= "Verify Email Address";
		$email_msg	=	"<b>Hello,</b>";
		$email_msg	.=	"<p>Please click the link below to verify your email address.</p>";
		$email_msg	.=	"<a href = ".$redirect_url." target = '_blank'>Verify Your Email Address</a>";
		$this->send_smtp_mail($email_msg, $subject, $to);
	}

	public function restaurant_booking_mail($data = "") {
		$total_people = $data['adult_guests_for_booking'] + $data['child_guests_for_booking'];
		$date = date('D, d-M-Y', strtotime($data['date']));
		$subject 		= "Table Booking Request on $date";
		$email_msg	=	"<b>Hello,</b>";
		$email_msg	.=	"<p>I would like to book a table for ". $total_people ." people. Adults in number is ".$data['adult_guests_for_booking']." and Child in number is ".$data['child_guests_for_booking'].".</p>";
		$email_msg	.=	"<p>I would like to book this on ".$date.". Please let me know from your side.</p>";

		$user_details = $this->user_model->get_all_users($this->session->userdata('user_id'))->row_array();

		$this->send_smtp_mail($email_msg, $subject, $data['to'], $user_details['email']);
	}

	public function hotel_booking_mail($data = "") {
		$total_people = $data['adult_guests_for_booking'] + $data['child_guests_for_booking'];
		$book_from = $data['book_from'];
		$book_to = $data['book_to'];
		$subject 		= "Hotel Room Booking Request from $book_from to $book_to";
		$email_msg	=	"<b>Hello,</b>";
		$email_msg	.=	"<p>I would like to book a ".$data['room_type']." room for ". $total_people ." people. Adults in number is ".$data['adult_guests_for_booking']." and Child in number is ".$data['child_guests_for_booking'].".</p>";
		$email_msg	.=	"<p>I would like to book this from ".$book_from." to ".$book_to.". Please let me know from your side.</p>";

		$user_details = $this->user_model->get_all_users($this->session->userdata('user_id'))->row_array();
		$this->send_smtp_mail($email_msg, $subject, $data['to'], $user_details['email']);
	}

	public function contact_us_mail($data = "") {
		$subject 		= "Contact us";
		$email_msg	=	"Hello, This is <b>".$data['name']."</b>";
		$email_msg	.=	"<p>".$data['message']."</p>";

		$user_details = $this->user_model->get_all_users($this->session->userdata('user_id'))->row_array();
		$this->send_smtp_mail($email_msg, $subject, $data['to'], $user_details['email']);
	}

	// more stable function
	public function send_smtp_mail($msg=NULL, $sub=NULL, $to=NULL, $from=NULL) {
		//Load email library
		$this->load->library('email');

		if($from == NULL){
				$from		=	get_settings('system_email');
		}

		//SMTP & mail configuration
		$config = array(
			'protocol'  => get_settings('protocol'),
			'smtp_host' => get_settings('smtp_host'),
			'smtp_port' => get_settings('smtp_port'),
			'smtp_user' => get_settings('smtp_user'),
			'smtp_pass' => get_settings('smtp_pass'),
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'smtp_timeout' => '30',
			'mailpath' => '/usr/sbin/sendmail',
			'wordwrap' => TRUE
		);
		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");

		//Email content
		// $htmlContent = '<h1>Sending email via SMTP server</h1>';
		// $htmlContent .= '<p>This email has sent via SMTP server from CodeIgniter application.</p>';
		$htmlContent = $msg;

		$this->email->to($to);
		$this->email->from($from, get_settings('website_title'));
		$this->email->subject($sub);
		$this->email->message($htmlContent);

		//Send email
		$this->email->send();
		// echo $this->email->print_debugger();
		// die();
	}
}

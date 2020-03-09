<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
class MY_Controller extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();  
		$this->load->model('admin/configs_model');
		date_default_timezone_set(configs_model::getValue(15,'config_value')); //DEFAULT_TIME_ZONE
	}
	
	
	
	
	public function send_email($template = '', $subject = '', $to = '', $toName = '', $from = 'no-reply@techcellar.com', $fromName = '', $cc = '', $bcc = '' ){
		$this->load->model('admin/configs_model');
		$condition="(";
		$condition.="config_name like 'EMAIL_PROTOCOL'"; //EMAIL_PROTOCOL
		$condition.="or config_name like 'EMAIL_TYPE'"; //EMAIL_TYPE
		$condition.="or config_name like 'SMTP_HOST'"; //SMTP_HOST
		$condition.="or config_name like 'SMTP_USER'"; //SMTP_USER
		$condition.="or config_name like 'SMTP_PASS'"; //SMTP_PASS
		$condition.="or config_name like 'SMTP_PORT'"; //SMTP_PORT
		$condition.=")";
		$condition=trim($condition);
		$result=configs_model::getSearch($condition,"","",true);
		$data='';
		foreach($result as $q){
			$data[$q->config_name]=$q->config_value;
		}
		
		$config['protocol'] = $data['EMAIL_PROTOCOL'];
		$config['mailtype'] = $data['EMAIL_TYPE'];
		$config['newline'] = "\r\n";
		$config['crlf'] = "\r\n";

		if ($config['protocol'] == 'smtp'){
			$config['smtp_host'] = $data['SMTP_HOST'];
			$config['smtp_user'] = $data['SMTP_USER'];
			$config['smtp_pass'] = $data['SMTP_PASS'];
			$config['smtp_port'] = $data['SMTP_PORT'];
		}

		// Load E-mail Library
		$this->load->library('email');

		$this->email->initialize($config);

		$this->email->from($from, $fromName);
		$this->email->to($to);
		$this->email->cc($cc);
		$this->email->bcc($bcc);
		$this->email->subject($subject);
		$this->email->set_newline("\r\n");
		$this->email->message($template);

		$this->email->send();

		$this->email->clear();
	}
	
	
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PhpMailerLib 
{

    private $mail;  

	function __construct()
	{
		require_once(APPPATH."third_party/phpmailer/PHPMailer.php");
        $this->mail = new \PHPMailer\PHPMailer\PHPMailer;
        $this->mail->isSMTP();                                      // Set mailer to use SMTP
        $this->mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
        $this->mail->Username = 'blackdesire002@gmail.com';
        $this->mail->Password = 'JR143/,.&';
        $this->mail->SMTPSecure = 'ssl';                            
        $this->mail->Port = '465';
	}



        public function start_ride($data)
        {
            $this->mail->SMTPDebug = 1;
            $this->mail->setFrom($this->mail->Username, 'Delivery App');
            $this->mail->addAddress('adnan.arif50@gmail.com'); 
            $this->mail->isHTML(true);                                  // Set email format to HTML
            $this->mail->Subject = 'Your Package Arrived';
            $this->mail->Body    = "<br><div> <b>Best Regards,</b> <br> Delivery APP</div>";

            $email = $this->mail->send();

            $res = array('res'=>$email,'data'=>$this->mail);
        
            return $res;
        }

    }



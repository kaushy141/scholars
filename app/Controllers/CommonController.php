<?php

namespace App\Controllers;
use App\Libraries\Html;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class CommonController extends BaseController
{
	public $request;
	public $response;
	public $logger;
	public $email;
	protected $helpers = ['form', 'url', 'html', 'my', 'date', 'filesystem'];
	public $head = array(
		"title" => "Welcome to ".APP_NAME." - India",
		"description" => "Get details about ".APP_NAME,
		"image" => "",
		"site_name" => APP_NAME,
		"url" =>APP_CANONICAL_URL,
		"type" =>"website",
		"page_name" =>APP_NAME,
		"author" =>APP_NAME
	);
	
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
		$this->session = \Config\Services::session();
		helper($this->helpers);
    }

	public function uploadFile($image, $folder=null){
		$folder??="general";
		if(isset($_FILES[$image]['name']) && !empty($_FILES[$image]['name'])){
			if($file = $this->request->getFile($image)) {
				if ($path = $file->store(getFolderName($folder))) {
					$newFileLoc = 'public/uploads/'.$path;
					mkdir(FCPATH.dirname($newFileLoc), 0777, true);
					rename(FCPATH.'writable/uploads/'.$path, FCPATH.$newFileLoc);
					return $newFileLoc;
				}else
					return false;
			}else
				return false;
		}else
		return false;
	}	
	
	protected function sendConfirmationLink($user_id){
		if($user_id){
			$user = model(UserModel::class);
			if($userData = $user->get($user_id))
			{
				$verificationModel = model(VerificationModel::class);			
				$this->createEmail($userData['email'], $userData['fname'], "New Registration - ".APP_NAME);
				$content = $this->emailView('user-registration', $this->emailData([
					'user_name' => $userData['fname']. ' ' .$userData['lname'],
					'app_name' => APP_NAME,
					'activation_link' => $verificationModel->getLink($user_id, $verificationModel::$verificationTypeMail)
				]));
				$this->setEmailMessage($content);
				$this->sentEmail();
				return true;
			}else
				return false;
		}else
			return false;
	}
	
	protected function changePassword($user_id){
		$user = model(UserModel::class);
		if($userData = $user->get($user_id)){
			$password = getRandomPassword();
			$user->update($user_id, ['password' => md5($password)]);
			return $password;
		}else
			return false;
	}

	public function emailView($page, $data = array())
	{
		$parser  = \Config\Services::parser();
		$parser->setData($data);
		return $parser->render('admin/email-template/inc/email-header')
		.$parser->render('admin/email-template/'.$page)
		.$parser->render('admin/email-template/inc/email-footer');
    }

	public function emailData($data = array()){
		$basicData = array(
			'site_logo' => base_url('public/img/logo.png'),
			'app_name' => APP_NAME,
			'about_link' => base_url('about-us'),
			'faq_link' => base_url('faq'),
			'privacy_link' => base_url('privacy-policy'),
			'unsubscribe_link' => base_url('unsubscribe/'),
		);
		return array_merge($basicData, $data);
	}

	public function getMessageIcon($variant){
		$messageIconArray = array(
			'primary' => '<i class="fa fa-check"></i>',
			'warning' => '<i class="fa fa-warning"></i>',
			'danger' => '<i class="fa fa-close"></i>',
			'success' => '<i class="fa fa-check"></i>',
			'info' => '<i class="fa fa-circle-info"></i>',
		);
		return isset($messageIconArray[$variant]) ? $messageIconArray[$variant] : "";
	}

	public function setFlashMessage($message, $variant="primary")
    {
       $this->session->setFlashdata('message', $message);
	   $this->session->setFlashdata('variant', $variant);
	   $this->session->setFlashdata('icon', $this->getMessageIcon($variant));
    }

	public function createEmail($to, $name, $subject=null, $message=null){
		$this->email = \Config\Services::email();
		$this->email->setFrom(DEFAULT_SENDER_EMAIL, DEFAULT_SENDER_NAME);
		$this->email->setTo($to);
		$this->email->setCC(DEFAULT_EMAIL_CC);
		$this->email->setBCC(DEFAULT_EMAIL_BCC);
		$this->email->setSubject($subject == null ? "Mail from ".APP_NAME : $subject);
		$this->email->setMessage($message);
		return $this->email;
	}
	public function addToEmail($to){
		$this->email->setTo($to);
		return $this->email;
	}
	public function setEmailSubject($subject){
		$this->email->setSubject($subject);
		return $this->email;
	}
	public function setEmailMessage($message){
		$this->email->setMessage($message);
		return $this->email;
	}
	public function sentEmail(){
		$this->email->send();
	}
}

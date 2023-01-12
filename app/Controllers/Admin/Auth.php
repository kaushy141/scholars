<?php
namespace App\Controllers\Admin;
use App\Models\UserModel;
use App\Models\VerifiactionModel;
use App\Controllers\AdminController;
class Auth extends AdminController
{
	public $minPasswordLength = APP_MIN_PASS_LENGTH;
	
	public function signin()
    {
        $this->setTitle('Sign in');
		$data = array();
        echo $this->authView('admin/auth/signin', $data);
    }
	public function signup()
    {
		$this->setTitle('Sign up');
        $data = array();
        echo $this->authView('admin/auth/signup', $data);
    }
	public function resetpassword()
    {
        return authView('admin/auth/resetpassword');
    }
	public function passwordreset()
    {
        return authView('admin/auth/passwordreset');
    }
	public function logout($hash='')
	{
		if($hash == $this->session->get('hash')){
			$user = model(UserModel::class);
			$user->logLogout($this->session->get('log-login'));
			$this->session->destroy();
			$this->setFlashMessage('Logout successfull', 'success');
			return $this->response->redirect(site_url('admin/auth/signin'));	
		}
		else{
			return $this->response->redirect(site_url('secure/dashboard/index'));	
		}		
	}	
	public function verification($token)
	{
		$verificationModel = model(VerificationModel::class);
		if($record = $verificationModel->check($token)){
			$user = model(UserModel::class);
			$userRecord = $user->get($record['user_id']);
			$user->update($record['user_id'], array($record['type'] == $verificationModel::$verificationTypeMail ? 'email_verified' :'mobile_verified' => 1));
			$verificationModel->update($record['id'], array('status' => 0));
			$this->setFlashMessage("{$record['type']} verified successfully", 'success');
			return $this->response->redirect(site_url('admin/auth/signin'));	
		}
		else{
			$this->setFlashMessage("Verification link expired or invalid", 'warning');
			return $this->response->redirect(site_url('admin/auth/signin'));	
		}		
	}	
public function signincheck()
    {
		if($this->request->getMethod() === 'post')
		{
			$user = model(UserModel::class);
			$user_id = 0;
			if ($this->validate([
				'email' => "required|valid_email" ,
				'password' => "required"  			
			])){
				if($authUser = $user->where('email', $this->request->getPost('email'))->where('password', md5($this->request->getPost('password')))->first()){
					if($authUser['status'] == $user->$unverified){
						$this->setFlashMessage('Your account is not verified yet. Check email for verification link or Reset password.', 'warning');
						return $this->response->redirect(site_url('admin/auth/signin'));
					}
					elseif($authUser['status'] == $user->$suspended){
						$this->setFlashMessage('Your account was suspended. You aren\'t authorized to login', 'warning');
						return $this->response->redirect(site_url('admin/auth/signin'));
					}
					elseif($authUser['status'] == $user->$deleted){
						$this->setFlashMessage('Your account was deleted. You aren\'t authorized to login', 'danger');
						return $this->response->redirect(site_url('admin/auth/signin'));
					}
					elseif($authUser['email_verified'] == 1){
						$userRecord = $user->get($authUser['id']);
						$this->session->set($userRecord);
						$this->session->set('isLogin', true);
						$this->session->set('hash', md5(json_encode($userRecord)));
						$this->setFlashMessage('Signin successfull.', 'success');
						$this->session->set('log-login', $user->logLogin($this->request, $userRecord['id']));
						$user->addActivity($this->request, $userRecord['id'], "Signin successfull", "Account", "primary");
						return $this->response->redirect(site_url('admin/secure/dashboard'));
					}else{
						$this->setFlashMessage('Email is not verified yet. Please check email or Click to <a href="'.base_url('auth/resetpassword').'">Reset Password</a>', 'warning');
						return $this->response->redirect(site_url('admin/auth/signin'));
					}
				}
				else{ //echo $user->db->getLastQuery();die;
					$this->setFlashMessage('Incorrect login details', 'warning');
					return $this->response->redirect(site_url('admin/auth/signin'));
				}
			}else{
				$this->setFlashMessage($this->validator->listErrors(), 'warning');
				return $this->response->redirect(site_url('admin/auth/signin'));
			}
		}
		else{
			$this->setFlashMessage('Invalid request', 'warning');
			 return $this->response->redirect(site_url('admin/auth/signin'));
		}
    }
	
	public function signupcheck()
    {
		if($this->request->getMethod() === 'post')
		{
			$user = model(UserModel::class);
			$user_id = 0;
			if ($this->validate([
				'fname'  => 'required|alpha',
				'lname'  => 'required|alpha',
				'type'  => 'required|numeric|',
				'mobile'  => 'required|numeric',
				'email' => "required|valid_email|is_unique[users.email,id,{$user_id}]" ,
				'password' => "required|min_length[$this->minPasswordLength]"  			
			])){
				$userData = array(
					'fname' => $this->request->getPost('fname'),
					'lname' => $this->request->getPost('lname'),
					'type' => $this->request->getPost('type'),
					'code' => md5(trim(strtolower($this->request->getPost('email')))),
					'email' => trim(strtolower($this->request->getPost('email'))),
					'mobile' => $this->request->getPost('mobile'),
					'password' => md5($this->request->getPost('password')),
					'email_verified' => 0,
					'mobile_verified' => 0,
					'created_date' => time(),
					'image' => $user->defaultImage, 
					'status' => $user->unverified
				);			
				
				if($user_id = $user->insert($userData)){
					$this->sendConfirmationLink($user_id);					
					$this->setFlashMessage('Account created successfully. An email confirmation link sent to your email '.$userData['email'].', Confirm email to continue. ', 'success');
					return $this->response->redirect(site_url('admin/auth/signup'));
				}
				else{
					$this->setFlashMessage('Unbale to create account', 'warning');
					return $this->response->redirect(site_url('admin/auth/signup'));
				}
			}else{
				$this->setFlashMessage($this->validator->listErrors(), 'warning');
				return $this->response->redirect(site_url('admin/auth/signup'));
			}
		}
		else{
			$this->setFlashMessage('Invalid request', 'warning');
			 return $this->response->redirect(site_url('admin/auth/signup'));
		}
    }
}

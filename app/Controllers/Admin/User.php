<?php

namespace App\Controllers\Admin;
use App\Controllers\AdminController;

class User extends AdminController
{
	public static $status = [
		['key'=>'activate', 'value'=>'Active', 'class'=>'success', 'icon'=>'user-check', 'label'=>'Activate'], 
		['key'=>'unverified', 'value'=>'Unverified', 'class'=>'info', 'icon'=>'user-x', 'label'=>'Unverify'], 
		['key'=>'suspend', 'value'=>'Suspended', 'class'=>'warning', 'icon'=>'user-x', 'label'=>'Suspend'], 
		['key'=>'delete', 'value'=>'Deleted', 'class'=>'danger', 'icon'=>'trash', 'label'=>'Delete Account'], 
	];
    public function profile($user_id=0)
    {
		$user = model(UserModel::class);
		$userData = $user->get($user_id ? $user_id : $this->session->get('id'));
		if($userData){
			$this->setTitle("{$userData['fname']} {$userData['lname']}'s Profile");
			echo $this->adminView('user/profile', ['data'=>$userData]);
		}else{
			$this->setFlashMessage('No account exist.', 'danger');
			return $this->response->redirect(site_url("admin/secure/dashboard"));
		}
    }
	public function thememode()
    {
		$this->session->set('darkmode', !$this->session->get('darkmode'));
		return $this->response->redirect($this->request->getUserAgent()->getReferrer());
    }
	public function layoutcollapse()
    {
		$this->session->set('collapse-menu', !$this->session->get('collapse-menu'));
		return $this->response->redirect($this->request->getUserAgent()->getReferrer());
    }
	
	public function registration($user_id=0)
    {
		if($this->session->get('type') == USER_TYPE_ADMIN){
			$user = model(UserModel::class);
			$data = [];
			if($user_id){
				$data = $user->get($user_id);
				$data['incomesource'] = array_column($user->getUserIncomeSources($user_id), 'incomesource_id');
				$identity = $user->getUserIdentities($user_id);
				//print_r($identity);die;
				if($identity){
					$data = array_merge($data, $identity);
				}
				if($data['address_id']){
					$address = $user->getUserAddress($user_id, $data['address_id']);
					$data = array_merge($data, array_intersect_key($address, array_flip(array('line1', 'line2', 'district', 'state', 'country', 'pincode'))));
				}
				$this->setTitle("{$data['fname']} {$data['lname']} Information");
			}
			$incomesource = $user->getIncomeSourcesList();
			$identities = $user->getIdentitiesList();
			$states = $user->getStatesList();
			$types = $user->getUserTypes($data['type']);
			echo $this->adminView('user/registration', ['incomesource' => $incomesource, 'states'=>$states, 'identities' => $identities, 'types'=>$types, 'data'=>$data]);

		}else{
			$this->setFlashMessage('Permission denined.', 'danger');
			return $this->response->redirect($this->request->getUserAgent()->getReferrer());
		}
    }
	
	public function sendEmailLink($user_id){
		if($this->session->get('type') == USER_TYPE_ADMIN){
			if($user_id){
				$this->sendConfirmationLink($user_id);
				$this->setFlashMessage('Email confirmation link sent successfully.', 'success');
			}
			else{
				$this->setFlashMessage('User not found.', 'warning');
			}
		}
		else{
			$this->setFlashMessage('Permission denined.', 'danger');
		}
		return $this->response->redirect($this->request->getUserAgent()->getReferrer());
	}
	
	public function changeUserPassword($user_id){
		if($this->session->get('type') == USER_TYPE_ADMIN){
			if($user_id){
				if($password = $this->changePassword($user_id)){
					$this->setFlashMessage("Password Change successfully. New password is <b>{$password}</b>", 'success');
				}
				else
					$this->setFlashMessage('Unable to change user password.', 'warning');
			}
			else{
				$this->setFlashMessage('User not found.', 'warning');
			}
		}
		else{
			$this->setFlashMessage('Permission denined.', 'danger');
		}
		return $this->response->redirect($this->request->getUserAgent()->getReferrer());
	}
	

	public function save($user_id=0)
    {
		$newUser = !$user_id;
		if($this->request->getMethod() === 'post')
		{
			$user = model(UserModel::class);
			$validationArray = [
				'type'  => 'required|numeric',
				'fname'  => 'required|alpha',
				'lname'  => 'required|alpha',
				'mobile'  => 'required|numeric|exact_length[10]',
				'email' => "required|valid_email|is_unique[users.email,id,{$user_id}]",
				'line1' => "alpha_numeric_punct",
				'line2' => "alpha_numeric_punct",
				'district' => "alpha_space",
				'state' => "alpha_space",
				'country' => "alpha_space",
				'pincode' => "numeric|exact_length[6]",
				//'image' => "uploaded[image]|is_image[image]|ext_in[image,png,jpg,jpeg]|max_size[image,4096]",
				//'identity_doc' => "max_size[identity_doc,4096]",
			];
			if($user_id == 0){
				$validationArray['password'] = "required|min_length[".APP_MIN_PASS_LENGTH."]";
			}
			if ($this->validate($validationArray)){
				$userData = array(
					'fname' => $this->request->getPost('fname'),
					'mname' => $this->request->getPost('mname'),
					'lname' => $this->request->getPost('lname'),
					'type' => $this->request->getPost('type'),
					'email' => trim(strtolower($this->request->getPost('email'))),
					'mobile' => $this->request->getPost('mobile'),
					'line1' => $this->request->getPost('line1'),
					'line2' => $this->request->getPost('line2'),
					'district' => $this->request->getPost('district'),
					'state' => $this->request->getPost('state'),
					'country' => $this->request->getPost('country'),
					'pincode' => $this->request->getPost('pincode'),
					'email_verified' => 1,
					'mobile_verified' => 1,
					'created_date' => time(),
					'image' => $user->defaultImage
				);

				if($user_id == 0){
					$userData = array_merge($userData, array(
						'code' => md5(trim(strtolower($this->request->getPost('email')))),
						'email_verified' => 1,
						'mobile_verified' => 1,
						'image' => $user->defaultImage,
						'password' => $this->request->getPost('password')? $this->request->getPost('password') : md5(getRandomPassword())
						)
					);
					$user->addActivity($this->request, $user_id, "Account created", "Account", "success");
					$user_id = $user->insert($userData);
				}
				else{
					if($this->request->getPost('password')){
						$userData['password'] = md5($this->request->getPost('password'));
					}
					$user->update($user_id,$userData);
					$user->addActivity($this->request, $user_id, "Account updated", "Account", "success");
				}
				#=============File Upload====================================
				if ($path = $this->uploadFile('image', 'user')) {
					$user->update($user_id, ['image' => $path]);
				}			
				#============================================================

				if($user_id){					
					$address_id = $user->saveAddress(
						$user_id,
						$this->request->getPost('line1'),
						$this->request->getPost('line2'),
						$this->request->getPost('district'),
						$this->request->getPost('state'),
						$this->request->getPost('country'),
						$this->request->getPost('pincode')
					);
					$user->update($user_id, ['address_id' => $address_id]);
					
					if($this->request->getPost('incomesource')){
						$user->saveIncomeSorces($user_id, $this->request->getPost('incomesource'));
					}
					
					if($this->request->getPost('identity_id') && $this->request->getPost('identity_value')){						
						$user->saveIdentities($user_id, $this->request->getPost('identity_id'), $this->request->getPost('identity_value'), null);
					}
					if($newUser){
						$this->sendConfirmationLink($user_id);
					}
					$this->setFlashMessage($newUser ? 'User created successfully.' : 'User updated successully', 'success');
					return $this->response->redirect(site_url("admin/secure/user/registration/{$user_id}"));
				}
			}else{
				$this->setFlashMessage($this->validator->listErrors(), 'warning');
				return $this->response->redirect(site_url("admin/secure/user/registration/{$user_id}"));
			}
		}
		else{
			$this->setFlashMessage('Action not allowed', 'warning');
			return $this->response->redirect($this->request->getUserAgent()->getReferrer());
		}
    }
	
	
	public function activate($user_id=0)
	{
		if($this->session->get('type') == USER_TYPE_ADMIN){
			$user = model(UserModel::class);
			$userData = $user->get($user_id);			
			if($userData && $user_id != 0){
				$user->update($userData['id'], ['status'=>$user->active, 'deleted_date'=>NULL]);
				$user->addActivity($this->request, $userData['id'], "Account activated", "Account", "success");
				$this->setFlashMessage('User account activated successfully.', 'success');
			}else{
				$this->setFlashMessage('No account found.', 'warning');
			}
		}else{
			$this->setFlashMessage('Permission denined.', 'danger');
		}
		return $this->response->redirect($this->request->getUserAgent()->getReferrer());
    }
	public function unverified($user_id=0)
	{
		if($this->session->get('type') == USER_TYPE_ADMIN){
			$user = model(UserModel::class);
			$userData = $user->get($user_id);
			if($userData && $user_id != 0){
				$user->update($userData['id'], ['status'=>$user->unverified, 'deleted_date'=>NULL]);
				$user->addActivity($this->request, $userData['id'], "Account marked unverified", "Account", "warning");
				$this->setFlashMessage('User account marked unverified successfully.', 'success');
			}else{
				$this->setFlashMessage('No account found.', 'warning');
			}
		}else{
			$this->setFlashMessage('Permission denined.', 'danger');
		}
		return $this->response->redirect($this->request->getUserAgent()->getReferrer());
    }
	public function suspend($user_id=0)
	{
		if($this->session->get('type') == USER_TYPE_ADMIN){
			$user = model(UserModel::class);
			$userData = $user->get($user_id);
			if($userData && $user_id != 0){
				$user->update($userData['id'], ['status'=>$user->suspended, 'deleted_date'=>NULL]);
				$user->addActivity($this->request, $userData['id'], "Account suspended", "Account", "danger");
			}
			$this->setFlashMessage('User account suspended successfully.', 'success');	
		}else{
			$this->setFlashMessage('Permission denined.', 'danger');
		}
		return $this->response->redirect($this->request->getUserAgent()->getReferrer());
    }
	
	public function delete($id)
    {
		if($this->session->get('type') == USER_TYPE_ADMIN){
			$user = model(UserModel::class);
			$userData = $user->get($id);
			if($userData){
				$user->update($userData['id'], ['status'=>'Deleted']);
				$user->delete($userData['id']);
				$user->addActivity($this->request, $userData['id'], "Account deleted", "Account", "danger");
				$this->setFlashMessage('User deleted successfull.', 'success');
			}
			else{
				$this->setFlashMessage('No account found.', 'warning');
			}
		}else{
			$this->setFlashMessage('Permission denined.', 'danger');
		}
		return $this->response->redirect($this->request->getUserAgent()->getReferrer());
    }

	public function admin()
    {
		$user = model(UserModel::class);
		$userlist = $user->getList(USER_TYPE_ADMIN);
		$this->setTitle('Admin List Accounts');
		echo $this->adminView('user/userlist', ['userlist' =>$userlist, 'status'=>self::$status, 'listName'=>'Admin']);
    }
	public function donner()
    {
		$user = model(UserModel::class);
		$userlist = $user->getList(USER_TYPE_DONNER);
		$this->setTitle("Donner List Accounts");
		echo $this->adminView('user/userlist', ['userlist' =>$userlist, 'status'=>self::$status, 'listName'=>'Donner']);
    }
	public function student()
    {
		$user = model(UserModel::class);
		$userlist = $user->getList(USER_TYPE_STUDENT);
		$this->setTitle("Student List Accounts");
		echo $this->adminView('user/userlist', ['userlist' =>$userlist, 'status'=>self::$status, 'listName'=>'Student']);
    }
}

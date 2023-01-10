<?php

namespace App\Controllers\Admin;
use App\Controllers\AdminController;

class Master extends AdminController
{	
	public function registrationScholar($scholar_id=0)
    {
		if($this->session->get('type') == USER_TYPE_ADMIN){
			$scholar = model(ScholarModel::class);
			$data = [];
			if($scholar_id){
				$data = $scholar->get($scholar_id);				
				$this->head['title'] = "{$data['scholar_name']} Information";
			}
			echo $this->adminView('scholar/registration', ['data'=>$data], $this->head);

		}else{
			$this->setFlashMessage('Permission denined.', 'danger');
			return $this->response->redirect($this->request->getUserAgent()->getReferrer());
		}
    }

	public function saveScholar($scholar_id=0)
    {
		$newScholar = !$scholar_id;
		if($this->request->getMethod() === 'post')
		{
			$scholar = model(ScholarModel::class);
			$validationArray = [
				'scholar_name'  => 'required|alpha_numeric_punct',
				'scholar_status'  => 'required|numeric'
			];
			if ($this->validate($validationArray)){
				$scholarData = array(
					'scholar_name' => $this->request->getPost('scholar_name'),
					'scholar_status' => $this->request->getPost('scholar_status')
				);

				if($scholar_id == 0){
					$scholarData = array_merge($scholarData, array(
						'scholar_created_date' => time(),
						'scholar_created_by' => $this->session->get('id'),
						'scholar_image' => $scholar->defaultImage
						)
					);
					$scholar_id = $scholar->insert($scholarData);
				}
				else{
					$scholar->update($scholar_id,$scholarData);
				}
				#=============File Upload====================================
				if ($path = $this->uploadFile('image', 'scholar')) {
					$scholar->update($scholar_id, ['scholar_image' => $path]);
				}			
				#============================================================

				if($scholar_id){					
					$this->setFlashMessage($newScholar ? 'Scholar created successfully.' : 'Scholar updated successully', 'success');
					return $this->response->redirect(site_url("admin/secure/master/registration-scholar/{$scholar_id}"));
				}
			}else{
				$this->setFlashMessage($this->validator->listErrors(), 'warning');
				return $this->response->redirect(site_url("admin/secure/user/registration-scholar/{$scholar_id}"));
			}
		}
		else{
			$this->setFlashMessage('Action not allowed', 'warning');
			return $this->response->redirect($this->request->getUserAgent()->getReferrer());
		}
    }
		
	public function scholarList()
    {
		$scholar = model(ScholarModel::class);
		$scholarlist = $scholar->getList();
		$this->head['title'] = "Scholar List Accounts";
		echo $this->adminView('scholar/scholarlist', ['scholarlist' =>$scholarlist], $this->head);
    }
	
}

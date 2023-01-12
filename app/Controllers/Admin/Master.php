<?php

namespace App\Controllers\Admin;
use App\Controllers\AdminController;

class Master extends AdminController
{
#=====================================Scholar=======================================================================
	public function registrationScholar($id=0)
    {
		if($this->session->get('type') == USER_TYPE_ADMIN){
			$scholar = model(ScholarModel::class);
			$data = [];
			if($id){
				$data = $scholar->getScholar($id);				
				$this->setTitle("{$data['name']} Information");
			}
			echo $this->adminView('scholar/registration-scholar', ['data'=>$data]);

		}else{
			$this->setFlashMessage('Permission denined.', 'danger');
			return $this->response->redirect($this->request->getUserAgent()->getReferrer());
		}
    }
	
	public function scholarList()
    {
		$scholar = model(ScholarModel::class);
		$scholarlist = $scholar->getScholarList();
		$this->setTitle("Scholar List");
		echo $this->adminView('scholar/list-scholar', ['scholarlist' =>$scholarlist]);
    }

	public function saveScholar($id=0)
    {
		$newScholar = !$id;
		if($this->request->getMethod() === 'post')
		{
			$scholar = model(ScholarModel::class);
			$validationArray = [
				'name'  => 'required|alpha_numeric_punct',
				'status'  => 'required|numeric'
			];
			if ($this->validate($validationArray)){
				$insertData = array(
					'name' => $this->request->getPost('name'),
					'status' => $this->request->getPost('status')
				);

				if($id == 0){
					$insertData = array_merge($insertData, array(
						'created_date' => time(),
						'created_by' => $this->session->get('id'),
						'image' => $scholar->defaultImage
						)
					);
					$id = $scholar->insert($insertData);
				}
				else{
					$scholar->update($id,$insertData);
				}
				#=============File Upload====================================
				if ($path = $this->uploadFile('image', 'scholar')) {
					$scholar->update($id, ['image' => $path]);
				}			
				#============================================================

				if($id){					
					$this->setFlashMessage($newScholar ? 'Scholar created successfully.' : 'Scholar updated successully', 'success');
					return $this->response->redirect(site_url("admin/secure/master/registration-scholar/{$id}"));
				}
			}else{
				$this->setFlashMessage($this->validator->listErrors(), 'warning');
				return $this->response->redirect(site_url("admin/secure/user/registration-scholar/{$id}"));
			}
		}
		else{
			$this->setFlashMessage('Action not allowed', 'warning');
			return $this->response->redirect($this->request->getUserAgent()->getReferrer());
		}
    }

#=====================================Identity=======================================================================	
	public function registrationIdentity($id=0)
    {
		if($this->session->get('type') == USER_TYPE_ADMIN){
			$identity = model(IdentityModel::class);
			$data = [];
			if($id){
				$data = $identity->getIdentity($id);
				$this->setTitle("{$data['name']} Information");
			}
			echo $this->adminView('identity/registration-identity', ['data'=>$data]);

		}else{
			$this->setFlashMessage('Permission denined.', 'danger');
			return $this->response->redirect($this->request->getUserAgent()->getReferrer());
		}
    }
	
	public function identitiesList()
    {
		$identity = model(IdentityModel::class);
		$identitylist = $identity->getIdentitiesList();
		$this->setTitle("Identity List");
		echo $this->adminView('identity/list-identity', ['identitylist' =>$identitylist]);
    }
	
	public function saveIdentity($id=0)
    {
		$newIdentity = !$id;
		if($this->request->getMethod() === 'post')
		{
			$identity = model(IdentityModel::class);
			$validationArray = [
				'name'  => 'required|alpha_numeric_punct',
				'status'  => 'required|numeric'
			];
			if ($this->validate($validationArray)){
				$insertData = array(
					'name' => $this->request->getPost('name'),
					'status' => $this->request->getPost('status')
				);

				if($id == 0){
					$insertData = array_merge($insertData, array(
						'created_date' => time(),
						'created_by' => $this->session->get('id'),
						'image' => $identity->defaultImage
						)
					);
					$id = $identity->insert($insertData);
				}
				else{
					$identity->update($id,$insertData);
				}
				#=============File Upload====================================
				if ($path = $this->uploadFile('image', 'identity')) {
					$identity->update($id, ['image' => $path]);
				}			
				#============================================================

				if($id){					
					$this->setFlashMessage($newScholar ? 'Identity created successfully.' : 'Identity updated successully', 'success');
					return $this->response->redirect(site_url("admin/secure/master/registration-identity/{$id}"));
				}
			}else{
				$this->setFlashMessage($this->validator->listErrors(), 'warning');
				return $this->response->redirect(site_url("admin/secure/user/registration-identity/{$id}"));
			}
		}
		else{
			$this->setFlashMessage('Action not allowed', 'warning');
			return $this->response->redirect($this->request->getUserAgent()->getReferrer());
		}
    }
#=====================================Qualification==================================================================			
	public function registrationQualification($id=0)
    {
		if($this->session->get('type') == USER_TYPE_ADMIN){
			$qualification = model(QualificationModel::class);
			$data = [];
			if($id){
				$data = $qualification->getQualification($id);
				$this->setTitle("{$data['name']} Information");
			}
			echo $this->adminView('qualification/registration-qualification', ['data'=>$data]);

		}else{
			$this->setFlashMessage('Permission denined.', 'danger');
			return $this->response->redirect($this->request->getUserAgent()->getReferrer());
		}
    }	
	
	public function qualificationsList()
    {
		$qualification = model(QualificationModel::class);
		$qualificationlist = $qualification->getQualificationsList();
		$this->setTitle("Qualification List");
		echo $this->adminView('qualification/list-qualification', ['qualificationlist' =>$qualificationlist]);
    }
	
	public function saveQualification($id=0)
    {
		$newIdentity = !$id;
		if($this->request->getMethod() === 'post')
		{
			$qualification = model(QualificationModel::class);
			$validationArray = [
				'name'  => 'required|alpha_numeric_punct',
				'status'  => 'required|numeric'
			];
			if ($this->validate($validationArray)){
				$insertData = array(
					'name' => $this->request->getPost('name'),
					'status' => $this->request->getPost('status')
				);

				if($id == 0){
					$insertData = array_merge($insertData, array(
						'created_date' => time(),
						'created_by' => $this->session->get('id'),
						'image' => $qualification->defaultImage
						)
					);
					$id = $qualification->insert($insertData);
				}
				else{
					$qualification->update($id,$insertData);
				}
				#=============File Upload====================================
				if ($path = $this->uploadFile('image', 'qualification')) {
					$qualification->update($id, ['image' => $path]);
				}			
				#============================================================

				if($id){					
					$this->setFlashMessage($newScholar ? 'Qualification created successfully.' : 'Qualification updated successully', 'success');
					return $this->response->redirect(site_url("admin/secure/master/registration-qualification/{$id}"));
				}
			}else{
				$this->setFlashMessage($this->validator->listErrors(), 'warning');
				return $this->response->redirect(site_url("admin/secure/user/registration-qualification/{$id}"));
			}
		}
		else{
			$this->setFlashMessage('Action not allowed', 'warning');
			return $this->response->redirect($this->request->getUserAgent()->getReferrer());
		}
    }
#==================================Metrics==========================================================================	
	public function registrationMetrics($id=0)
    {
		if($this->session->get('type') == USER_TYPE_ADMIN){
			$metrics = model(MetricsModel::class);
			$data = [];
			if($id){
				$data = $metrics->getMetrics($id);
				$this->setTitle("{$data['name']} Information");
			}
			echo $this->adminView('metrics/registration-metrics', ['data'=>$data]);

		}else{
			$this->setFlashMessage('Permission denined.', 'danger');
			return $this->response->redirect($this->request->getUserAgent()->getReferrer());
		}
    }	
	
	public function metricsList()
    {
		$metrics = model(MetricsModel::class);
		$metricslist = $metrics->getMetricsList();
		$this->setTitle("Metrics List");
		echo $this->adminView('metrics/list-metrics', ['metricslist' =>$metricslist]);
    }
	
	public function saveMetrics($id=0)
    {
		$newIdentity = !$id;
		if($this->request->getMethod() === 'post')
		{
			$metrics = model(MetricsModel::class);
			$validationArray = [
				'name'  => 'required|alpha_numeric_punct',
				'status'  => 'required|numeric'
			];
			if ($this->validate($validationArray)){
				$insertData = array(
					'name' => $this->request->getPost('name'),
					'status' => $this->request->getPost('status')
				);

				if($id == 0){
					$insertData = array_merge($insertData, array(
						'created_date' => time(),
						'created_by' => $this->session->get('id'),
						'image' => $metrics->defaultImage
						)
					);
					$id = $metrics->insert($insertData);
				}
				else{
					$metrics->update($id,$insertData);
				}
				#=============File Upload====================================
				if ($path = $this->uploadFile('image', 'metrics')) {
					$metrics->update($id, ['image' => $path]);
				}			
				#============================================================

				if($id){					
					$this->setFlashMessage($newScholar ? 'Metrics created successfully.' : 'Metrics updated successully', 'success');
					return $this->response->redirect(site_url("admin/secure/master/registration-metrics/{$id}"));
				}
			}else{
				$this->setFlashMessage($this->validator->listErrors(), 'warning');
				return $this->response->redirect(site_url("admin/secure/user/registration-metrics/{$id}"));
			}
		}
		else{
			$this->setFlashMessage('Action not allowed', 'warning');
			return $this->response->redirect($this->request->getUserAgent()->getReferrer());
		}
    }
}

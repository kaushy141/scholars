<?php

namespace App\Controllers\Admin;
use App\Controllers\AdminController;

class Store extends AdminController
{
	public function profile()
	{
		echo $this->adminView('store/profile', array(), $this->head);
	}

	public function registration($store_id = 0)
	{
		if ($this->session->get('type') == USER_TYPE_ADMIN) {
			$user = model(UserModel::class);
			$store = model(StoreModel::class);
			$data = [];
			$this->head['title'] = "Add new Store";
			if ($store_id) {
				$data = $store->get($store_id);
				$this->head['title'] = "{$data['name']} Information";
			}
			$states = $user->getStatesList();
			echo $this->adminView('store/registration', ['states' => $states, 'data' => $data], $this->head);
		} else {
			$this->setFlashMessage('Permission denined.', 'danger');
			return $this->response->redirect($this->request->getUserAgent()->getReferrer());
		}
	}

	public function save($store_id = 0)
	{
		$newStore = !$store_id;
		if ($this->request->getMethod() === 'post') {
			$store = model(StoreModel::class);
			$validationArray = [
				'name'  => 'required|alpha',
				'mobile'  => 'required|numeric|exact_length[10]',
				'dealer'  => 'required|alpha',
				'about' => "alpha_numeric_punct",
				'line1' => "alpha_numeric_punct",
				'line2' => "alpha_numeric_punct",
				'district' => "alpha_space",
				'state' => "alpha_space",
				'country' => "alpha_space",
				'position' => "numeric",
				'status' => "numeric|permit_empty",
				'image' => 'uploaded[image]|max_size[image,2000]'
			];
			if ($this->validate($validationArray)) {
				$storeData = array(
					'name' => $this->request->getPost('name'),
					'mobile' => $this->request->getPost('mobile'),
					'dealer' => $this->request->getPost('dealer'),
					'about' => $this->request->getPost('about'),
					'line1' => $this->request->getPost('line1'),
					'line2' => $this->request->getPost('line2'),
					'district' => $this->request->getPost('district'),
					'state' => $this->request->getPost('state'),
					'country' => $this->request->getPost('country'),
					'position' => $this->request->getPost('position'),
					'status' => $this->request->getPost('status')
				);
				if ($store_id == 0) {
					$storeData['created_date'] = time();
					$store_id = $store->insert($storeData);
				} else {
					$store->update($store_id, $storeData);
				}
				#=============File Upload====================================
				if ($file = $this->request->getFile('image')) {
					if ($path = $file->store(getFolderName('store'))) {
						$store->update($store_id, ['image' => $path]);
					}
				}
				#============================================================
				if ($store_id) {
					$this->setFlashMessage($newStore ? 'Store created successfully.' : 'Store updated successully', 'success');
					return $this->response->redirect(site_url("admin/secure/store/registration/{$store_id}"));
				}
				else{
					$this->setFlashMessage('Unable to Save Store', 'warning');
					return $this->response->redirect(site_url("admin/secure/store/registration/{$store_id}"));
				}
			} else {
				$this->setFlashMessage($this->validator->listErrors(), 'warning');
				return $this->response->redirect(site_url("admin/secure/store/registration/{$store_id}"));
			}
		} else {
			$this->setFlashMessage('Unauthorised attempt.', 'warning');
			return $this->response->redirect(site_url("admin/secure/store/registration/" . ($store_id ? $store_id : "")));
		}
	}

	public function list()
	{
		$store = model(StoreModel::class);
		$storelist = $store->getList();
		echo $this->adminView('store/storelist', ['storelist' => $storelist], $this->head);
	}
}

<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class Scholarship extends AdminController
{
	#=====================================Scholarship=======================================================================
	public function registration($id = 0)
	{
		if ($this->session->get('type') == USER_TYPE_ADMIN) {
			$scholarship = model(ScholarshipModel::class);
			$config = model(ConfigModel::class);
			$data = [];
			if ($id) {
				$data = $scholarship->getScholarship($id);
				$this->setTitle("{$data['name']} Information");
				$data['scholarship_criteria'] = $scholarship->getScholarshipSavedCriteria($data['id']);
			}
			$plateform_fee = $config->getValue('PLATEFORM_FEE');
			$inr = $config->getValue('INR');
			$scholar = model(ScholarModel::class);
			$scholars = $scholar->getScholarList($id ? $data['scholar_id'] : 0);
			$qualifications = $id ? $scholar->getScholarQualification($data['scholar_id']) : [];
			$cycles = $scholarship::$cycles;
			$criteriaList = $scholarship->getSelectionCriteriaWithOptions();
			echo $this->adminView('scholarship/registration-scholarship', ['data' => $data, 'scholars' => $scholars, 'cycles' => $cycles, 'qualifications' => $qualifications, 'criteriaList' =>$criteriaList, 'plateform_fee' => $plateform_fee, 'inr' => $inr]);
		} else {
			$this->setFlashMessage('Permission denined.', 'danger');
			return $this->response->redirect($this->request->getUserAgent()->getReferrer());
		}
	}

	public function scholarshipList()
	{
		$scholarship = model(ScholarshipModel::class);
		$scholarshiplist = $scholarship->getScholarshipList();
		$this->setTitle("Scholarship List");
		echo $this->adminView('scholarship/list-scholarship', ['scholarshiplist' => $scholarshiplist]);
	}

	public function publishedScholarship()
	{
		$scholarship = model(ScholarshipModel::class);
		$scholarshiplist = $scholarship->getDetailScholarshipListPublished();
		$this->setTitle("Published Scholarship List");
		echo $this->adminView('scholarship/list-scholarship-detail', ['scholarshiplist' => $scholarshiplist]);
	}

	public function appliedScholarship()
	{
		$scholarship = model(ScholarshipModel::class);
		$scholarshiplist = $scholarship->getDetailScholarshipListApplied($this->session->get('id'));
		$this->setTitle("Published Scholarship List");
		echo $this->adminView('scholarship/list-scholarship-detail', ['scholarshiplist' => $scholarshiplist]);
	}

	public function commingsoonScholarship()
	{
		$scholarship = model(ScholarshipModel::class);
		$scholarshiplist = $scholarship->getDetailScholarshipListCommingsoon();
		$this->setTitle("Published Scholarship List");
		echo $this->adminView('scholarship/list-scholarship-detail', ['scholarshiplist' => $scholarshiplist]);
	}

	public function saveScholarship($id = 0)
	{
		$newScholar = !$id;
		if ($this->request->getMethod() === 'post') {
			$scholarship = model(ScholarshipModel::class);
			$validationArray = [
				'scholar_id'  => 'required|numeric',
				'no_of_scholars'  => 'required|numeric',
				'amount_of_scholar'  => 'required|numeric',
				'total_scholar_amount'  => 'required|numeric',
				'fin_year'  => 'required|numeric|exact_length[4]',
				//'publish_date'  => 'required|valid_date',
				//'reg_start_date'  => 'required|valid_date',
				//'reg_end_date'  => 'required|valid_date',
				//'announce_date'  => 'required|valid_date',
				'criteria_type' => "required|in_list[Rules,Manual]",
				'cycle'  => 'required|in_list[' . implode(',', $scholarship::$cycles) . ']',
				'status'  => 'required|numeric',
				'auto_renew' => 'if_exist|in_list[0,1]'
			];
			if ($this->validate($validationArray)) {
				$insertData = array(
					'scholar_id'  => $this->request->getPost('scholar_id'),
					'no_of_scholars'  => $this->request->getPost('no_of_scholars'),
					'amount_of_scholar'  => $this->request->getPost('amount_of_scholar'),
					'total_scholar_amount'  => $this->request->getPost('total_scholar_amount'),
					'fin_year'  => $this->request->getPost('fin_year'),
					//'publish_date'  => $this->request->getPost('publish_date'),
					//'reg_start_date'  => $this->request->getPost('reg_start_date'),
					//'reg_end_date'  => $this->request->getPost('reg_end_date'),
					//'announce_date'  => $this->request->getPost('announce_date'),
					'criteria_type' => $this->request->getPost('criteria_type'),
					'cycle'  => $this->request->getPost('cycle'),
					'status' => $this->request->getPost('status'),
					'auto_renew' => $this->request->getPost('auto_renew') ? 1 : 0
				);
				if ($id == 0) {
					$insertData = array_merge(
						$insertData,
						array(
							'created_date' => time(),
							'created_by' => $this->session->get('id'),
						)
					);
					$id = $scholarship->insert($insertData);
				} else {
					$scholarship->update($id, $insertData);
				}
				$scholarship->clearCriteria($id);
				if($this->request->getPost('criteria_type') == 'Rules'){
					$criteriaList = $this->request->getPost('criteria');
					foreach($criteriaList as $_criteriaId){
						$scholarship->addCriteria([
							'scholarship_id' => $id,
							'criteria_id' => $_criteriaId,
							'operator' => $this->request->getPost('criteria_operator')[$_criteriaId],
							'value' => implode(',',$this->request->getPost('criteria_value')[$_criteriaId])
						]);
					}
				}else{
					
				}

				if ($id) {
					$this->setFlashMessage($newScholar ? 'Scholarship created successfully.' : 'Scholarship updated successully', 'success');
					return $this->response->redirect(site_url("admin/secure/scholarship/registration/{$id}"));
				}
			} else {
				$this->setFlashMessage($this->validator->listErrors(), 'warning');
				return $this->response->redirect($this->request->getUserAgent()->getReferrer());
			}
		} else {
			$this->setFlashMessage('Action not allowed', 'warning');
			return $this->response->redirect($this->request->getUserAgent()->getReferrer());
		}
	}
}
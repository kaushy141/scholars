<?php
namespace App\Models;
use App\Models\MyModel;

class ScholarModel extends MyModel {

	protected $table      = 'scholar';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

	protected $allowedFields = ['name', 'details', 'image', 'status'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_date';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
	protected $defaultImage     = 'public/img/scholar_default.png';
	protected $defaultIdentityImage     = 'public/img/scholar_identity_default.png';
	protected $defaultQualificationImage     = 'public/img/scholar_qualification_default.png';
	protected $defaultMetricsImage     = 'public/img/scholar_metrics_default.png';


	public function getScholar($id)
	{
		$builder = $this->db->table('scholar');
		$builder->select("{$this->table}.*");
		$builder->where("{$this->table}.id", $id);
		$query = $builder->get();
		return $query->getFirstRow('array');
	}
	
	public function getScholarList($id = 0)
	{
		$builder = $this->db->table('scholar');
		$builder->select("*");		
		$builder->where("status", 1);
		$builder->orWhere("id", $id);
		$query = $builder->get();
		//echo $this->db->getLastQuery();die;
		return $query->getResultArray();
	}	
	
	public function getScholarshipList($id, $scholar_list_id=0){
		$builder = $this->db->table("scholar_list");
		$builder->select("scholar_list.*, scholar.name");
		$builder->join("scholar", "scholar.id = scholar_list.scholar_id");
		$builder->where("scholar.id", $id);
		if($scholar_list_id)
		$builder->where("scholar_list_id", $scholar_list_id);
		$builder->orderBy("scholar_list_created_date", "DESC");
		$query = $builder->get();
		//echo $this->db->getLastQuery();
		if($scholar_list_id)
			return $query->getFirstRow('array');
		else
			return $query->getResultArray();
	}
	
	public function getScholarQualification($scholar_id, $column=null){
		$builder = $this->db->table('scholar_qualification');
		$builder->select("qualification_id, qualification.image, qualification.name");
		$builder->join("qualification", "qualification.id = scholar_qualification.qualification_id");
		$builder->where("scholar_id", $scholar_id);
		$query = $builder->get();
		return $column !== null ? array_column($query->getResultArray(), $column) : $query->getResultArray();
	}
		
	public function saveScholarQualification($scholar_id, $qualifications)
	{
		$scholarQualification =  $this->getScholarQualification($scholar_id, 'qualification_id');
		$newQualification = array_diff($qualifications, $scholarQualification);
		$deleteQualification = array_diff($scholarQualification, $qualifications);

		foreach($newQualification as $qualification_id){
			$builder = $this->db->table("scholar_qualification");
			$builder->insert(["qualification_id" => $qualification_id, "scholar_id" => $scholar_id ]);
		}

		foreach($deleteQualification as $qualification_id){
			$builder = $this->db->table("scholar_qualification");
			$builder->where('scholar_id', $scholar_id);
			$builder->where('qualification_id', $qualification_id);
			$builder->delete();
		}
	}
}
?>
<?php
namespace App\Models;
use App\Models\MyModel;

class ScholarshipModel extends MyModel {

	protected $table      = 'scholarship';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

	protected $allowedFields = ['scholar_id', 'amount', 'year', 'publish_date', 'reg_start_date', 'reg_end_date', 'announce_date', 'cycle', 'updated_date', 'deleted_date', 'status', 'auto_renew'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_date';
    protected $updatedField  = 'updated_date';
    protected $deletedField  = 'deleted_date';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
	
	public static $cycles = ['Monthly','Quaterly','Half Yearly','Yearly','Once Only'];

	public function getScholarship($id)
	{
		$builder = $this->db->table($this->table);
		$builder->select("*");
		$builder->where("id", $id);
		$query = $builder->get();
		return $query->getFirstRow('array');
	}
	
	public function getScholarshipList()
	{
		$builder = $this->db->table($this->table);
		$builder->select("{$this->table}.*, scholar.name, scholar.image");
		$builder->join("scholar", "scholar.id = {$this->table}.scholar_id");
		$builder->orderBy("{$this->table}.created_date", "DESC");
		$query = $builder->get();
		//echo $this->db->getLastQuery();
		return $query->getResultArray();
	}
	
	public function getDetailScholarshipListPublished()
	{
		$builder = $this->db->table($this->table);
		$builder->select("{$this->table}.*, scholar.details, scholar.name, scholar.image, GROUP_CONCAT(CONCAT(qualification.name, '|', qualification.image) ORDER BY qualification.id  SEPARATOR '^') AS qualifications");
		$builder->join("scholar", "scholar.id = {$this->table}.scholar_id");
		$builder->join("scholar_qualification", "scholar_qualification.scholar_id = {$this->table}.scholar_id", 'left');
		$builder->join("qualification", "scholar_qualification.qualification_id = qualification.id", 'left');
		$builder->where("scholar.status", '1');	
		$builder->where("scholarship.status", '1');	
		$builder->where("scholarship.publish_date <=", date('Y-m-d'));	
		$builder->groupBy("scholar.id");
		$builder->orderBy("{$this->table}.publish_date", "DESC");
		$query = $builder->get();
		//echo $this->db->getLastQuery();
		return $query->getResultArray();
	}
	
	public function getDetailScholarshipListApplied($user_id)
	{
		$builder = $this->db->table($this->table);
		$builder->select("{$this->table}.*, scholar.details, scholar.name, scholar.image, GROUP_CONCAT(CONCAT(qualification.name, '|', qualification.image) ORDER BY qualification.id  SEPARATOR '^') AS qualifications");
		$builder->join("scholar", "scholar.id = {$this->table}.scholar_id");
		$builder->join("scholar_applied", "scholar.id = scholar_applied.scholar_id");
		$builder->join("scholar_qualification", "scholar_qualification.scholar_id = {$this->table}.scholar_id", 'left');
		$builder->join("qualification", "scholar_qualification.qualification_id = qualification.id", 'left');
		$builder->where("scholar.status", '1');	
		$builder->where("scholarship.status", '1');
		$builder->where("scholar_applied.user_id", $user_id);	
		$builder->groupBy("scholar.id");
		$builder->orderBy("{$this->table}.publish_date", "DESC");
		$query = $builder->get();
		//echo $this->db->getLastQuery();
		return $query->getResultArray();
	}
	
	public function getDetailScholarshipListCommingsoon()
	{
		$builder = $this->db->table($this->table);
		$builder->select("{$this->table}.*, scholar.details, scholar.name, scholar.image, GROUP_CONCAT(CONCAT(qualification.name, '|', qualification.image) ORDER BY qualification.id  SEPARATOR '^') AS qualifications");
		$builder->join("scholar", "scholar.id = {$this->table}.scholar_id");
		$builder->join("scholar_qualification", "scholar_qualification.scholar_id = {$this->table}.scholar_id", 'left');
		$builder->join("qualification", "scholar_qualification.qualification_id = qualification.id", 'left');
		$builder->where("scholar.status", '1');	
		$builder->where("scholarship.status", '1');	
		$builder->where("scholarship.publish_date >", date('Y-m-d'));	
		$builder->groupBy("scholar.id");
		$builder->orderBy("{$this->table}.publish_date", "DESC");
		$query = $builder->get();
		//echo $this->db->getLastQuery();
		return $query->getResultArray();
	}
	
	public function getScholarScholarshipList($id = 0){
		$builder = $this->db->table($this->table);
		$builder->select("{$this->table}.*, scholar.name, scholar.image");
		$builder->join("scholar", "scholar.id = {$this->table}.scholar_id");
		$builder->where("scholar.id", $id);		
		$builder->orderBy("{$this->table}.created_date", "DESC");
		$query = $builder->get();
		//echo $this->db->getLastQuery();
		return $query->getResultArray();
	}
}
?>
<?php
namespace App\Models;
use App\Models\MyModel;

class ScholarModel extends MyModel {

	protected $table      = 'scholar';
    protected $primaryKey = 'scholar_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

	protected $allowedFields = ['scholar_name', 'scholar_image', 'scholar_status'];
    protected $useTimestamps = false;
    protected $createdField  = 'scholar_created_date';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
	protected $defaultImage     = 'public/img/scholar_default.png';


	public function get($scholar_id)
	{
		$builder = $this->db->table($this->table);
		$builder->select("{$this->table}.*");
		$builder->where("{$this->table}.scholar_id", $scholar_id);
		$query = $builder->get();
		return $query->getFirstRow('array');
	}
	
	public function getList()
	{
		$builder = $this->db->table($this->table);
		$builder->select("*");
		$query = $builder->get();
		return $query->getResultArray();
	}
	
	public function getScholarList($scholar_id, $scholar_list_id=0){
		$builder = $this->db->table("scholar_list");
		$builder->select("scholar_list.*, scholar.scholar_name");
		$builder->join("scholar", "scholar.scholar_id = scholar_list.scholar_id");
		$builder->where("scholar_id", $scholar_id);
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
}
?>
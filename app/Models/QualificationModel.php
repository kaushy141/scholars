<?php
namespace App\Models;
use App\Models\MyModel;

class QualificationModel extends MyModel {

	protected $table      = 'qualification';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

	protected $allowedFields = ['name', 'image', 'status'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_date';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
	protected $defaultImage     = 'public/img/qualification_default.png';

	public function getQualification($id)
	{
		$builder = $this->db->table($this->table);
		$builder->select("*");
		$builder->where("id", $id);
		$query = $builder->get();
		return $query->getFirstRow('array');
	}
	
	public function getQualificationsList()
	{
		$builder = $this->db->table($this->table);
		$builder->select("*");
		$query = $builder->get();
		return $query->getResultArray();
	}
}
?>
<?php
namespace App\Models;
use App\Models\MyModel;

class MetricsModel extends MyModel {

	protected $table      = 'metrics';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

	protected $allowedFields = ['name', 'image', 'details', 'status'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_date';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
	protected $defaultImage     = 'public/img/metrics_default.png';

	public function getMetrics($id)
	{
		$builder = $this->db->table($this->table);
		$builder->select("*");
		$builder->where("id", $id);
		$query = $builder->get();
		return $query->getFirstRow('array');
	}
	
	public function getMetricsList()
	{
		$builder = $this->db->table($this->table);
		$builder->select("*");
		$query = $builder->get();
		return $query->getResultArray();
	}
}
?>
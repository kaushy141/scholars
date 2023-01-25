<?php

namespace App\Models;

use App\Models\MyModel;

class UserModel extends MyModel
{

	protected $table      = 'users';
	protected $primaryKey = 'id';

	protected $useAutoIncrement = true;

	protected $returnType     = 'array';
	protected $useSoftDeletes = true;

	protected $allowedFields = ['type', 'fname', 'mname', 'lname', 'email', 'mobile', 'password', 'address_id', 'city', 'district', 'state', 'country', 'image', 'email_verified', 'mobile_verified', 'charges', 'updated_date', 'deleted_date', 'status'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_date';
	protected $updatedField  = 'updated_date';
	protected $deletedField  = 'deleted_date';

	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = false;
	protected $defaultImage     = 'public/img/user_default.png';
	protected $active = 'Active';
	protected $unverified = 'Unverified';
	protected $suspended = 'Suspended';
	protected $deleted = 'Deleted';


	public function get($user_id)
	{
		$builder = $this->db->table($this->table);
		$builder->select("{$this->table}.*, user_types.type_name");
		$builder->join("user_types", "user_types.type_id = {$this->table}.type");
		$builder->where("{$this->table}.id", $user_id);
		$builder->orWhere("{$this->table}.code", $user_id);
		$query = $builder->get();
		return $query->getFirstRow('array');
	}

	public function logLogin($request, $user_id)
	{
		$builder = $this->db->table("log_login");
		$builder->insert(["user_id" => $user_id, "device" => $this->getDevice($request), "ip_address" => $_SERVER['REMOTE_ADDR'], "session_id" => session_id()]);
		return $this->db->insertID();
	}
	public function logLogout($logLogin)
	{
		$builder = $this->db->table("log_login");
		$builder->where(["id" => $logLogin]);
		$builder->update(["logout_time" => date('Y-m-d H:i:s')]);
		//echo $this->db->getLastQuery();die;
	}

	public function addActivity($request, $user_id, $content, $title = null, $variant = 'default', $link = null)
	{
		$builder = $this->db->table("activity");
		$created_by = session()->get('id') ? session()->get('id') : 0;
		$builder->insert(["user_id" => $user_id, "title" => $title, "content" => $content, "variant" => $variant, "link" => $link, "ip_address" => $_SERVER['REMOTE_ADDR'], "device" => $this->getDevice($request), 'created_by' => $created_by]);
		///echo $this->db->getLastQuery();die;
	}

	public function getList($type = 0)
	{
		$builder = $this->db->table($this->table);
		$builder->select("{$this->table}.id, {$this->table}.code, {$this->table}.fname, {$this->table}.mname, {$this->table}.lname, {$this->table}.email, {$this->table}.image, {$this->table}.mobile, {$this->table}.created_date, {$this->table}.status, {$this->table}.email_verified, user_types.type_name");
		$builder->join("user_types", "user_types.type_id = {$this->table}.type");
		if ($type)
			$builder->where("{$this->table}.type", $type);
		$query = $builder->get();
		return $query->getResultArray();
	}

	public function searchUser($keyword = null, $type = null)
	{
		$builder = $this->db->table($this->table);
		$builder->select("{$this->table}.id, {$this->table}.code, {$this->table}.fname, {$this->table}.mname, {$this->table}.lname, {$this->table}.email, {$this->table}.image, {$this->table}.mobile, {$this->table}.created_date, {$this->table}.status, {$this->table}.email_verified, user_types.type_name");
		$builder->join("user_types", "user_types.type_id = {$this->table}.type");
		if ($type)
			$builder->where("{$this->table}.type", $type);
		$builder->where("{$this->table}.status", $this->active);
		$builder->where("{$this->table}.email_verified", 1);
		$builder->where("CONCAT(fname, ' ', lname) LIKE '%$keyword%' OR CONCAT(fname, ' ', mname, ' ', lname) LIKE '%$keyword%' OR fname LIKE '%$keyword%' OR mname LIKE '%$keyword%' OR lname LIKE '%$keyword%' OR email LIKE '%$keyword%' OR mobile LIKE '%$keyword%'");
		$builder->limit(10);
		$query = $builder->get();
		return $query->getResultArray();
	}


	public function getIncomeSourcesList()
	{
		$builder = $this->db->table("incomesource");
		$builder->select("id, name");
		$builder->where("status", 1);
		$builder->orderBy("id");
		$query = $builder->get();
		return $query->getResultArray();
	}

	public function getIdentitiesList($id = 0)
	{
		$builder = $this->db->table("identities");
		$builder->select("id, name");
		$builder->where("status", 1);
		$builder->orWhere("id", $id);
		$builder->orderBy("name");
		$query = $builder->get();
		return $query->getResultArray();
	}

	public function getStatesList($id = 0)
	{
		$builder = $this->db->table("states");
		$builder->select("id, name");
		$builder->where("status", 1);
		$builder->orWhere("id", $id);
		$builder->orderBy("name");
		$query = $builder->get();
		return $query->getResultArray();
	}

	public function getUserIncomeSources($user_id)
	{
		$builder = $this->db->table("user_incomesource");
		$builder->select("incomesource_id");
		$builder->where("user_id", $user_id);
		$query = $builder->get();
		//echo $this->db->getLastQuery();
		return $query->getResultArray();
	}

	public function getUserTypes($type_id = 0)
	{
		$builder = $this->db->table("user_types");
		$builder->select("type_id, type_name");
		$builder->where("type_status", 1);
		$builder->orWhere("type_id", $type_id);
		$builder->orderBy("type_id");
		$query = $builder->get();
		return $query->getResultArray();
	}

	public function getUserIdentities($user_id, $identity_id = 0)
	{
		$builder = $this->db->table("user_identities");
		$builder->select("identity_id, identity_value, identity_doc");
		$builder->where("user_id", $user_id);
		if ($identity_id)
			$builder->where("identity_id", $identity_id);
		$builder->orderBy("modified_date", "DESC");
		$query = $builder->get();
		//echo $this->db->getLastQuery();
		return $query->getFirstRow('array');
	}

	public function getUserAddress($user_id, $address_id = 0)
	{
		$builder = $this->db->table("address");
		$builder->select("*");
		$builder->where("user_id", $user_id);
		if ($address_id)
			$builder->where("id", $address_id);
		$builder->orderBy("created_date", "DESC");
		$query = $builder->get();
		//echo $this->db->getLastQuery();
		if ($address_id)
			return $query->getFirstRow('array');
		else
			return $query->getResultArray();
	}

	public function saveIncomeSorces($user_id, $incomeSources)
	{
		$userIncomeSources =  $this->getUserIncomeSources($user_id);
		$newIncomeSources = array_diff($incomeSources, array_column($userIncomeSources, 'incomesource_id'));
		$deleteIncomeSources = array_diff(array_column($userIncomeSources, 'incomesource_id'), $incomeSources);

		foreach ($newIncomeSources as $incomesource_id) {
			$builder = $this->db->table("user_incomesource");
			$builder->insert(["incomesource_id" => $incomesource_id, "user_id" => $user_id]);
		}

		foreach ($deleteIncomeSources as $incomesource_id) {
			$builder = $this->db->table("user_incomesource");
			$builder->where('user_id', $user_id);
			$builder->where('incomesource_id', $incomesource_id);
			$builder->delete();
		}
	}

	public function saveIdentities($user_id, $identity_id, $identity_value, $identity_doc = null)
	{
		$userIdentities =  $this->getUserIdentities($user_id, $identity_id);

		if ($userIdentities && $userIdentities['identity_value'] != $identity_value) {
			$builder = $this->db->table("user_identities");
			$builder->update(['identity_value' => $identity_value]);
			if ($identity_doc) {
				$builder->update(['identity_doc' => $identity_doc]);
			}
			$builder->where(["identity_id" => $identity_id, "user_id" => $user_id]);
		} else {
			$builder = $this->db->table("user_identities ");
			$builder->insert(["identity_id" => $identity_id, "user_id" => $user_id, "identity_value" => $identity_value]);
		}
	}

	public function saveAddress($user_id, $line1, $line2, $district, $state, $country, $pincode)
	{
		$userAddressArray = ["user_id" => $user_id, "line1" => $line1, "line2" => $line2, "district" => $district, "state" => $state, "country" => $country, "pincode" => $pincode];
		$builder = $this->db->table("address ");
		$builder->select("id");
		$builder->where($userAddressArray);
		$query = $builder->get();
		$userAddress =  $query->getFirstRow('array');

		if ($userAddress) {
			return $userAddress['id'];
		} else {
			$builder = $this->db->table("address ");
			$builder->insert($userAddressArray);
			return $this->db->insertID();
		}
	}
}
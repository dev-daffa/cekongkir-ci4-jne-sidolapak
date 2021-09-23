<?php

namespace App\Models;

use CodeIgniter\Model;

class JnedestModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'list_dest_sidolapak';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];


    public function getListBandung()
    {

		$builder = $this->db->table('list_dest_sidolapak')
        ->groupStart()
        ->where (['PROVINCE_NAME' => 'JAWA BARAT'])
            ->orGroupStart()
            ->orwhere (['PROVINCE_NAME' => 'JAWA TENGAH'])
            ->orwhere (['PROVINCE_NAME' => 'JAWA TIMUR'])
            ->orwhere (['PROVINCE_NAME' => 'BANTEN'])
            ->orwhere (['PROVINCE_NAME' => 'DKI JAKARTA'])
            ->orwhere (['PROVINCE_NAME' => 'BALI'])
            ->groupEnd()
        ->groupEnd();
	    return $builder->get();
    }

    public function getListLampung()
    {
		$builder = $this->db->table('list_dest_sidolapak')
        ->groupStart()
        ->where (['PROVINCE_NAME' => 'LAMPUNG'])
            ->orGroupStart()
            ->orwhere (['PROVINCE_NAME' => 'SUMATERA SELATAN'])
            ->orwhere (['PROVINCE_NAME' => 'BENGKULU'])
            ->orwhere (['PROVINCE_NAME' => 'JAMBI'])
            ->groupEnd()
        ->groupEnd();
	    return $builder->get();
    }
}

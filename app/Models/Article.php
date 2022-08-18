<?php

namespace App\Models;

use CodeIgniter\Model;

class Article extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'article';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function findAll($limit = 0, $offset = 0){
        $builder = $this->db->table('article');
        $builder->limit($limit, $offset);
        $builder->select('id, title, text');
        $builder->orderBy('id', 'asc');
        $builder->countAllResults(false);
        $data = $builder->get()->getResultArray();

        return $data;
    }
}

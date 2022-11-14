<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'students';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = \App\Entities\StudentEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "name", "number", "nik", "no_kk", "date_of_birth", "place_of_birth", "date", "father_name", "father_date_of_birth", "father_place_of_birth", "mother_name", "mother_date_of_birth", "mother_place_of_birth", "parents_job", "graduated", "graduation_year"
    ];

    // Dates
    protected $useTimestamps = true;
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

    public function getTotal()
    {
        $builder = $this->table("students");
        $builder->select("id");
        $data = $builder->get();
        return $data->getNumRows();
    }
}

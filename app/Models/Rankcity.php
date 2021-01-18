<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Rankcity extends Model
{
    protected $table = 'rankcity';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['id', 'city', 'guild', 'guildmark'];
    protected $useTimestamps = false;
    protected $createdFields = 'created_at';
    protected $updatedFields = 'updated_at';
    protected $deletedFields = 'deleted_at';

    /*protected $validationRules = [
        'name' => 'required|max_length[100]'
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'Nome referente ao guia obrigatório!',
            'max_length' => 'Apenas 100 caracteres!'
        ]
    ];*/

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];
    protected $beforeDelete = ['beforeDelete'];

    protected $skipValidation = false;

    protected function beforeInsert(array $data)
    {
        $data['data']['created_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data['data']['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    protected function beforeDelete(array $data)
    {
        $data['data']['deleted_at'] = date('Y-m-d H:i:s');
        return $data;
    }
}

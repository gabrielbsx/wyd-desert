<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Droplist extends Model
{
    protected $table = 'droplist';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['mobname', 'itemname'];
    protected $useTimestamps = false;
    protected $createdFields = 'created_at';
    protected $updatedFields = 'updated_at';
    protected $deletedFields = 'deleted_at';

    protected $validationRules = [
        'mobname' => 'required',
        'itemname' => 'required'
    ];

    protected $validationMessages = [
        'mobname' => [
            'required' => 'Nome do mob obrigatório!'
        ],
        'itemname' => [
            'required' => 'Item do mob obrigatório!'
        ]
    ];

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

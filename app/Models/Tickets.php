<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Tickets extends Model
{
    protected $table = 'tickets';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['id_user', 'status', 'title', 'content'];
    protected $useTimestamps = false;
    protected $createdFields = 'created_at';
    protected $updatedFields = 'updated_at';
    protected $deletedFields = 'deleted_at';

    protected $validationRules = [
        'title' => 'required|min_length[4]|max_length[50]',
        'status' => 'is_natural',
        'content' => 'required'
    ];

    protected $validationMessages = [
        'title' => [
            'required' => 'Título do ticket obrigatório!',
            'min_length' => 'Mínimo 4 caracteres!',
            'max_length' => 'Máximo 50 caracteres!',
            'alpha_numeric_space' => 'Apenas caracteres alfa numéricos e espaço!'
        ],
        'status' => [
            'is_natural' => 'Não foi possível encerrar o ticket!'  
        ],
        'content' => [
            'required' => 'Conteúdo obrigatório!'
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

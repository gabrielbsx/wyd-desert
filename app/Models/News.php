<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['id_user', 'title', 'content', 'category'];
    protected $useTimestamps = false;
    protected $createdFields = 'created_at';
    protected $updatedFields = 'updated_at';
    protected $deletedFields = 'deleted_at';

    protected $validationRules = [
        'title' => 'required|min_length[4]|max_length[50]',
        'content' => 'required',
        'category' => 'required|min_length[1]|max_length[1]|regex_match[/^([1-4])$/]|integer'
    ];

    protected $validationMessages = [
        'title' => [
            'required' => 'Título do ticket obrigatório!',
            'min_length' => 'Mínimo 4 caracteres!',
            'max_length' => 'Máximo 50 caracteres!',
            'alpha_numeric_space' => 'Apenas caracteres alfa numéricos e espaço!'
        ],
        'content' => [
            'required' => 'Conteúdo obrigatório!'
        ],
        'category' => [
            'required' => 'Categoria obrigatória!',
            'min_length' => 'Categoria inválida!',
            'max_length' => 'Categoria inválida!',
            'regex_match' => 'Categoria inválida!',
            'integer' => 'Categoria inválida!'
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

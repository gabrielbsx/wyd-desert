<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class GuideArticle extends Model
{
    protected $table = 'guide_article';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['title', 'id_guide', 'article'];
    protected $useTimestamps = false;
    protected $createdFields = 'created_at';
    protected $updatedFields = 'updated_at';
    protected $deletedFields = 'deleted_at';

    protected $validationRules = [
        'title' => 'required|max_length[100]',
        'id_guide' => 'required|is_natural_no_zero'
    ];

    protected $validationMessages = [
        'title' => [
            'required' => 'Título referente ao artigo do guia do jogo obrigatório!',
            'max_length' => 'Apenas 100 caracteres para o título!'
        ],
        'id_guide' => [
            'required' => 'Id referente ao guia obrigatório!',
            'is_natural_no_zero' => 'Apenas números naturais maiores que zero para o id do guia!'
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

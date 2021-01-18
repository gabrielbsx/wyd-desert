<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Donate extends Model
{
    protected $table = 'donate';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['name', 'value', 'donate', 'bonus'];
    protected $useTimestamps = false;
    protected $createdFields = 'created_at';
    protected $updatedFields = 'updated_at';
    protected $deletedFields = 'deleted_at';

    protected $validationRules = [
        'name' => 'required|max_length[50]',
        'value' => 'required|numeric',
        'donate' => 'required|is_natural_no_zero',
        'bonus' => 'required|is_natural'
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'Nome referente ao donate obrigatório!',
            'max_length' => 'Apenas 50 caracteres!'
        ],
        'value' => [
            'required' => 'Preço obrigatório!',
            'numeric' => 'Apenas valores numéricos para o preço!'
        ],
        'donate' => [
            'required' => 'Valor do donate obrigatório!',
            'is_natural_no_zero' => 'Apenas valores inteiros maiores que zero para o donate!'
        ],
        'bonus' => [
            'required' => 'O valor de bonificação é obrigatório!',
            'is_natural' => 'Apenas valores inteiros maiores ou igual a zero para o bônus!'
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

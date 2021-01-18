<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class MercadopagoRequests extends Model
{
    protected $table = 'mercadopago_requests';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['referenceId', 'referenceIdBox', 'value', 'status', 'id_user', 'url_payment'];
    protected $useTimestamps = false;
    protected $createdFields = 'created_at';
    protected $updatedFields = 'updated_at';
    protected $deletedFields = 'deleted_at';

    protected $validationRules = [
        'referenceId' => 'required|is_natural|is_unique[mercadopago_requests.referenceId]',
        'referenceIdBox' => 'required|is_unique[mercadopago_requests.referenceIdBox]',
        'value' => 'required|is_natural_no_zero',
        'status' => 'required|is_natural',
        'id_user' => 'required|is_natural'
    ];

    protected $validationMessages = [
        'referenceId' => [
            'required' => 'Id de referência obrigatório!',
            'is_natural' => 'O id de referência está inválido!',
            'is_unique' => 'O id de referência não é único!'
        ], 
        'value' => [
            'required' => 'Valor obrigatório!',
            'is_natural_no_zero' => 'Valor inválido, apenas números inteiros naturais!'
        ], 
        'status' => [
            'required' => 'Telefone obrigatório!',
            'is_natural' => 'Status inválido, apenas núnmeros naturais!'
        ], 
        'id_user' => [
            'required' => 'Id do usuário obrigatório!',
            'is_natural' => 'Id do usuário inválido, apenas núnmeros naturais!'
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

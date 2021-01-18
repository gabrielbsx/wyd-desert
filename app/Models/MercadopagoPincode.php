<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class MercadopagoPincode extends Model
{
    protected $table = 'mercadopago_pincode';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['status', 'pincode', 'referenceId'];
    protected $useTimestamps = false;
    protected $createdFields = 'created_at';
    protected $updatedFields = 'updated_at';
    protected $deletedFields = 'deleted_at';

    protected $validationRules = [
        'referenceId' => 'required|is_natural|is_unique[mercadopago_pincode.referenceId]',
        'pincode' => 'required|is_natural|is_unique[mercadopago_pincode.pincode]',
        'status' => 'required|is_natural'
    ];

    protected $validationMessages = [
        'referenceId' => [
            'required' => 'Id de referência obrigatório!',
            'is_natural' => 'O id de referência está inválido!',
            'is_unique' => 'O id de referência não é único!'
        ], 
        'pincode' => [
            'required' => 'Pincode obrigatório!',
            'is_natural' => 'O pincode está inválido!',
            'is_unique' => 'O pincode não é único!'
        ], 
        'status' => [
            'required' => 'Telefone obrigatório!',
            'is_natural' => 'Status inválido, apenas núnmeros naturais!'
        ], 
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

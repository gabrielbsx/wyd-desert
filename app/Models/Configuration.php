<?php

namespace App\Models;

use CodeIgniter\Model;

class Configuration extends Model
{
    protected $table = 'configuration';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['title', 'picpay_token', 'picpay_seller', 'recaptcha_secret', 'recaptcha_site', 'mercadopago_key', 'mercadopago_token'];
    protected $useTimestamps = false;
    protected $createdFields = 'created_at';
    protected $updatedFields = 'updated_at';
    protected $deletedFields = 'deleted_at';

    /*protected $validationRules = [
        'title' => 'required',
        'picpay_token' => 'required',
        'picpay_seller' => 'required',
        'recaptcha_secret' => 'required',
        'recaptcha_site' => 'required',
        'mercadopago_shortname' => 'required',
        'mercadopago_id' => 'required',
        'mercadopago_secret' => 'required'
    ];

    protected $validationMessages = [
        'title' => [
            'required' => 'Título do site obrigatório!',
        ],
        'picpay_token' => [
            'required' => 'Picpay token obrigatório!',
        ],
        'picpay_seller' => [
            'required' => 'Picpay seller obrigatório!',
        ],
        'recaptcha_secret' => [
            'required' => 'Recaptcha secret obrigatório!',
        ],
        'recaptcha_site' => [
            'required' => 'Recaptcha site obrigatório!',
        ],
        'mercadopago_shortname' => [
            'required' => 'Mercado pago shortname obrigatório!',
        ],
        'mercadopago_id' => [
            'required' => 'Mercado pago id obrigatório!',
        ],
        'mercadopago_secret' => [
            'required' => 'Mercado pago secret obrigatório!',
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

<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['username', 'password', 'email'];
    protected $useTimestamps = false;
    protected $createdFields = 'created_at';
    protected $updatedFields = 'updated_at';
    protected $deletedFields = 'deleted_at';

    protected $validationRules = [
        'username' => 'required|min_length[4]|max_length[12]|alpha_numeric|is_unique[users.username]',
        'password' => 'required|min_length[4]|max_length[10]|alpha_numeric',
        'password_confirm' => 'required_with[password]|matches[password]',
        'email' => 'required|min_length[10]|max_length[100]|valid_email'
    ];

    protected $validationMessages = [
        'username' => [
            'required' => 'Usuário obrigatório!',
            'is_unique' => 'Usuário existente!',
            'min_length' => 'Usuário deve conter no mínimo 4 caracteres!',
            'max_length' => 'Usuário deve conter no máximo 12 caracteres!',
            'alpha_numeric' => 'Usuário deve conter apenas caracteres alfa numéricos!'
        ],
        'password' => [
            'required' => 'Senha obrigatória!',
            'min_length' => 'Senha deve conter no mínimo 4 caracteres!',
            'max_length' => 'Senha deve conter no máximo 10 caracteres!',
            'alpha_numeric' => 'Senha deve conter apenas caracteres alfa numéricos!'
        ],
        'password_confirm' => [
            'matches' => 'Confirmação de senha não coincide com a senha!',
            'required_with' => 'Confirmação de senha obrigatória!'
        ],
        'email' => [
            'required' => 'Email obrigatório!',
            'min_length' => 'Email deve conter no mínimo 10 caracteres!',
            'max_length' => 'Email deve conter no máximo 100 caracteres!',
            'valid_email' => 'Email inválido!'
        ]
    ];

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];
    protected $beforeDelete = ['beforeDelete'];

    protected $skipValidation = false;

    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);
        $data['data']['created_at'] = date('Y-m-d H:i:s');
        $data['data']['access'] = 1;
        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);
        $data['data']['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    protected function beforeDelete(array $data)
    {
        $data = $this->passwordHash($data);
        $data['data']['deleted_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    protected function passwordHash(array $data)
    {
        if (isset($data['data']['password']))
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data;
    }
}

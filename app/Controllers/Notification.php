<?php

namespace App\Controllers;

use App\Models\Configuration;
use App\Models\MercadopagoPincode;
use App\Models\MercadopagoRequests;
use App\Models\Users;
use App\Models\Donate;
use App\Models\DonateBonus;
use App\Models\PicpayRequests;
use App\Models\PicpayPincode;
use MercadoPago;
use Picpay\Request\NotificationRemoteRequest;
use Picpay\Seller;
use Picpay\Exception\RequestException;
use Picpay\Request\StatusRequest;

class Notification extends BaseController
{
    public function index()
    {
        return redirect()->to(base_url('site'));
    }

    public function picpay()
    {
        $content = trim(file_get_contents('php://input'));
        $payload = json_decode($content);

        if (isset($payload->authorizationId, $payload->referenceId)) {
            $pic = (new Configuration())->select([
                'picpay_seller',
                'picpay_token',
                'title'
            ])->first();
            $notification = new NotificationRemoteRequest($content);
            $seller = new Seller($pic['picpay_token'], $pic['picpay_seller']);
            try {
                $statusRequest = new StatusRequest($seller, $payload->referenceId);
                $res = $statusRequest->execute();
                if ($res->status == 'paid') {
                    $pincode = new PicpayPincode();
                    if (!$pincode->where('referenceId', $payload->referenceId)->first()) {
                        do {
                            $pin = rand(1, 9999999);
                        } while ($pincode->where('pincode', $pin)->first());
                        $data = [
                            'status' => '0',
                            'pincode' => $pin,
                            'referenceId' => $payload->referenceId
                        ];
                        if ($pincode->save($data)) {
                            $requests = new PicpayRequests();
                            $data_request = $requests->select(['value', 'id_user'])->where('referenceId', $payload->referenceId)->first();
                            $user = (new Users())->where('id', $data_request['id_user'])->first()['username'];
                            $bonus = (new Donate())->where('value', $data_request['value'])->first();
                            $donate = (new Donate())->join('donate_bonus', 'donate_bonus.id_donate = donate.id')->where(['donate.value' => $data_request['value']])->get()->getResultArray();
                            $value_donate = $data_request['value'];
                            $bonus_donate = $bonus['bonus'];
                            $items = [];
                            foreach ($donate as $key => $value) {
                                $item['id'] = $value['itemid'];
                                $item['eff1'] = $value['effect1'];
                                $item['effvalue2'] = $value['effect_value1'];
                                $item['eff2'] = $value['effect2'];
                                $item['effvalue2'] = $value['effect_value2'];
                                $item['eff3'] = $value['effect3'];
                                $item['effvalue2'] = $value['effect_value3'];
                                array_push($items, $item);
                            }
                            $value = intval(ceil($value_donate + ($value_donate * ($bonus_donate / 100))));
                            $response = json_encode([
                                'user' => $user,
                                'donate' => $value,
                                'item_bonus' => $items
                            ]);
                        }
                    }
                }
            } catch (RequestException $e) {
                $errorMessage = $e->getMessage();
                $statusCode = $e->getCode();
                $errors = $e->getErrors();
            }
        }
    }

    public function mercadopago()
    {
        $mp = (new Configuration())->select([
            'mercadopago_key',
            'mercadopago_token',
            'title'
        ])->first();

        #MercadoPago\SDK::setClientId($mp['mercadopago_key']);
        #MercadoPago\SDK::setClientSecret($mp['mercadopago_token']);
        #MercadoPago\SDK::setPublicKey($mp['mercadopago_key']);
        MercadoPago\SDK::setAccessToken($mp['mercadopago_token']);

        $merchant_order = null;

        switch ($this->request->getGet('type')) {
            case 'payment':
                $payment = MercadoPago\Payment::find_by_id($this->request->getGet('data_id'));
                $merchant_order = MercadoPago\MerchantOrder::find_by_id($payment->order->id);
                break;

            case 'merchant':
                $merchant_order = MercadoPago\MerchantOrder::find_by_id($this->request->getGet('data_id'));
                break;
        }

        $paid_amount = $payment->transaction_amount;

        if ($paid_amount >= $merchant_order->total_amount) {
            if ($merchant_order->refunded_amount <= 0 && $merchant_order->order_status == 'paid') {
                $pincode = new MercadopagoPincode();
                if (!$pincode->where('referenceId', $payment->external_reference)->first()) {
                    do {
                        $pin = rand(1, 9999999);
                    } while ($pincode->where('pincode', $pin)->first());
                    $data = [
                        'status' => '0',
                        'pincode' => $pin,
                        'referenceId' => $payment->external_reference
                    ];
                    if ($pincode->save($data)) {
                        $requests = new MercadopagoRequests();
                        $data_request = $requests->select(['value', 'id_user'])->where('referenceId', $payment->external_reference)->first();
                        $user = (new Users())->where('id', $data_request['id_user'])->first()['username'];
                        $bonus = (new Donate())->where('value', $data_request['value'])->first();
                        $donate = (new Donate())->join('donate_bonus', 'donate_bonus.id_donate = donate.id')->where(['donate.value' => $data_request['value']])->get()->getResultArray();
                        $value_donate = $data_request['value'];
                        $bonus_donate = $bonus['bonus'];
                        $items = [];
                        foreach ($donate as $key => $value) {
                            $item['id'] = $value['itemid'];
                            $item['eff1'] = $value['effect1'];
                            $item['effvalue2'] = $value['effect_value1'];
                            $item['eff2'] = $value['effect2'];
                            $item['effvalue2'] = $value['effect_value2'];
                            $item['eff3'] = $value['effect3'];
                            $item['effvalue2'] = $value['effect_value3'];
                            array_push($items, $item);
                        }
                        $value = intval(ceil($value_donate + ($value_donate * ($bonus_donate / 100))));
                        $response = json_encode([
                            'user' => $user,
                            'donate' => $value,
                            'item_bonus' => $items
                        ]);
                    }
                }
            }
        }
    }
}

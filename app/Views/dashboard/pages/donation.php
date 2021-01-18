<?= $this->extend('dashboard/layouts') ?>
<?= $this->section('page') ?>
<main class="content">
    <div class="news-p">
        <div class="block-title">
            <div class="title">
                <span>D</span>oações
            </div>
        </div>
        <div class="last-more-fon">
            <div id="content" style="padding:20px;">
                <?php if ($donate_paginate) : ?>
                    <?php foreach ($donate_paginate as $key => $value) : ?>
                        <?php if ($value['createdAt'] == null) : ?>
                            <div style="text-align:center;">
                                Não há faturas
                            </div>
                        <?php
                            $auth = true;
                            continue;
                        endif; ?>
                        <div style="display:block;margin:10px;background-color:rgb(65, 65, 65);padding:5px;">
                            <div style="background-color:rgb(25, 25, 25);padding:10px;margin:10px;">
                                <span>
                                    R$ <?= $value['value'] ?>
                                </span>
                            </div>
                            <div style="padding:15px 0;display:block;text-align:center;">
                                <?php if (!($value['status'])) : ?>
                                    <a style="color:white;background-color:rgb(55, 105, 55);padding:10px;" target="_blank" href="<?= $value['paymentUrl'] ?>">
                                        Pagar
                                    </a>
                                <?php endif; ?>
                                <span style="color:white;background-color:<?= $value['status'] ? 'rgb(155, 55, 55);' : 'rgb(155, 155, 55);' ?>padding:10px;">
                                    <?= $value['status'] ? 'Pago' : 'Pendente' ?>
                                </span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div style="padding:10px;">
                        <?php if ($donate_pager && !isset($auth)) : ?>
                            <?= $donate_pager->links('donate', 'pagination') ?>
                        <?php endif; ?>
                    </div>
                <?php else : ?>
                    Não há pacotes de doação cadastrada!
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php if ($package_paginate) : ?>
        <div class="news-p">
            <div class="block-title">
                <div class="title">
                    <span>P</span>acotes
                </div>
            </div>
            <div class="last-more-fon">
                <div id="content" style="padding:20px;">
                    <?php foreach ($package_paginate as $key => $value) : ?>
                        <div style="display:inline-block;background-color:rgba(55,55,55,1);width:40%;margin:10px;">
                            <div>
                                <p style="text-align:center;padding:10px 0;background-color:rgba(25,25,25,0.2)"><?= $value['name'] ?></p>
                            </div>
                            <div>
                                <div>
                                    <img src="https://s3.amazonaws.com/preview.thegamecrafter.com/7C2E1DC8-245A-11EA-AA99-974C4E5FF538.png" class="w-3/5" />
                                </div>
                                <p style="background-color:rgba(105, 105, 105, 0.7);text-align:center;margin:10px;padding:10px;">
                                    <?= $value['donate'] ?> + <?= $value['bonus'] ?>% = <?= ceil($value['donate'] + ($value['donate'] * ($value['bonus'] / 100))) ?> donate
                                </p>
                                <?php if ($value['donate_bonus']) : ?>
                                    <div style="background-color:rgba(55, 75, 105, 0.7);text-align:center;padding: 10px;margin:10px;">
                                        <div style="border-bottom:1px solid rgb(55, 55, 55);">
                                            Bonificações
                                        </div>
                                        <?php foreach ($value['donate_bonus'] as $key2 => $value2) : ?>
                                            <div style="margin: 10px 0;">
                                                <?= $value2['itemname'] ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <div style="background-color:rgba(105, 105, 105, 0.7);text-align:center;margin:10px;padding:20px 0;">
                                    <p style="margin-bottom: 20px;background-color:rgba(155,155,155,0.2);padding:10px;margin:0 10px;margin-bottom: 20px;">R$<?= $value['value'] ?></p>
                                    <a style="background-color:rgba(105, 105, 155, 0.7);text-align:center;margin:10px;padding:10px;" href="<?= base_url('auth/purchasemp/' . $value['id']) ?>">
                                        Mercadopago
                                    </a>
                                    <a style="background-color:rgba(105, 105, 155, 0.7);text-align:center;margin:10px;padding:10px;" href="<?= base_url('auth/purchasepic/' . $value['id']) ?>">
                                        Picpay
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php else : ?>
        Não há pacotes de doação cadastrada!
    <?php endif; ?>
</main>
<?= $this->endSection() ?>
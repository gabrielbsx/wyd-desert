<?= $this->extend('layouts') ?>
<?= $this->section('page') ?>
<div class="Right-side-news">
    <div class="letest-news">
        <div class="letest-news-warp">
            <div class="news-title">
                <h1><span>Notícias</span></h1>
            </div>
            <div class="news-warp">
                <div class="single-news">
                    <div class="">
                        <img src="img/gif.gif" />
                    </div>
                    <div class="news-txt">
                        <h4>NOVA TEMPORADA 2021 América do Sul Servidor x30</h4>
                        <p1 style="
                                                        color: #6d5958;
                                                        font-size: 14px;
                                                        line-height: 16px;
                                                        margin: 0;
                                                        margin-bottom: 2px;
                                                        overflow: hidden;
                                                        display: -webkit-box;
                                                        -webkit-line-clamp: 4;
                                                        -webkit-box-orient: vertical;
                                                        max-width: 510px;
                                                        max-height: 64px;
                                                    ">
                            <p>Caros jogadores, Caros jogadores, a próxima temporada começa em 31.1.2021 às 17:00 GMT -3 (Brasil). High Five Servidor x30. Para mais informações visite nosso fórum..</p>
                        </p1>
                        <li style="padding-left: 0;">Author: <span>Admin</span></li>
                        <li style="border-right: 0;">Posted <span style="color: #4a3737;">10/12/2020 13:15</span></li>
                    </div>
                </div>
                <div class="single-news">
                    <div class="">
                        <img src="img/gif.gif" />
                    </div>
                    <div class="news-txt">
                        <h4>Novo system patch</h4>
                        <p1 style="
                                                        color: #6d5958;
                                                        font-size: 14px;
                                                        line-height: 16px;
                                                        margin: 0;
                                                        margin-bottom: 2px;
                                                        overflow: hidden;
                                                        display: -webkit-box;
                                                        -webkit-line-clamp: 4;
                                                        -webkit-box-orient: vertical;
                                                        max-width: 510px;
                                                        max-height: 64px;
                                                    ">
                            <p>Caros jogadores, hoje 11/08/2020 lançamos uma nova versão do patch do sistema, que contém um novo l2.exe. Faça o download assim que puder.</p>
                        </p1>
                        <li style="padding-left: 0;">Author: <span>Admin</span></li>
                        <li style="border-right: 0;">Posted <span style="color: #4a3737;">08/11/2020 3:15</span></li>
                    </div>
                </div>
                <div class="single-news">
                    <div class="">
                        <img src="img/gif.gif" />
                    </div>
                    <div class="news-txt">
                        <h4>GRANDE ABERTURA 23.8.2020 at 18:00 GMT +1</h4>
                        <p1 style="
                                                        color: #6d5958;
                                                        font-size: 14px;
                                                        line-height: 16px;
                                                        margin: 0;
                                                        margin-bottom: 2px;
                                                        overflow: hidden;
                                                        display: -webkit-box;
                                                        -webkit-line-clamp: 4;
                                                        -webkit-box-orient: vertical;
                                                        max-width: 510px;
                                                        max-height: 64px;
                                                    ">
                            <p>Caros jogadores, gostaríamos de convidá-los para o novo servidor High five x30. O servidor estará aberto às 18:00 GMT +1 BERLIN.</p>
                        </p1>
                        <li style="padding-left: 0;">Author: <span>Admin</span></li>
                        <li style="border-right: 0;">Posted <span style="color: #4a3737;">22/08/2020 13:15</span></li>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /*
<main class="content">
    <div class="news-p">
        <div class="block-title">
            <div class="title">
                <span>N</span>otícias
            </div>
        </div>
        <!-- block-title -->
        <div class="clearfix"></div>
        <?php if ($news_paginate) : ?>
            <?php foreach ($news_paginate as $key => $value) : ?>
                <div class="news-p-block">
                    <div class="news-p-info">
                        <h2>
                            <a href="<?= base_url('site/news/' . $value['id']) ?>">
                                <?= $value['title'] ?>
                            </a>
                        </h2>
                        <div class="news-p-text">
                            <?php if (strlen($value['content']) > 50) : ?>
                                <?= substr(strip_tags($value['content']), 0, 50) ?>...
                            <?php else : ?>
                                <?= $value['content'] ?>...
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="news-p-date">
                        <span><?= $value['updated_at'] ?? $value['created_at'] ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div style="padding:10px;">
            <?php if ($news_pager) : ?>
                <?= $news_pager->links('news', 'pagination') ?>
            <?php endif; ?>
        </div>
    </div>
</main>*/ ?>
<?= $this->endSection() ?>
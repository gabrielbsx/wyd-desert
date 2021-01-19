<?= $this->extend('layouts') ?>
<?= $this->section('page') ?>
<?php
$class = [
    '0' => '<img src="' . base_url('assets/images/tk.gif') . '">',
    '1' => '<img src="' . base_url('assets/images/bm.gif') . '">',
    '2' => '<img src="' . base_url('assets/images/fm.gif') . '">',
    '3' => '<img src="' . base_url('assets/images/ht.gif') . '">'
];
$kingdom = [
    '0' => '<img style="height:50%" src="' . base_url('assets/images/white.png') . '">',
    '7' => '<img style="height:50%" src="' . base_url('assets/images/red.png') . '">',
    '8' => '<img style="height:50%" src="' . base_url('assets/images/blue.png') . '">'
];
$evolution = [
    '1' => 'Mortal',
    '2' => 'Arch',
    '3' => 'Celestial',
    '4' => 'Subcelestial'
];
$translate = [
    'nick' => 'Jogador',
    'guild' => 'Guild',
    'level' => 'Nível',
    'kingdom' => 'Reino',
    'class' => 'Classe',
    'evolution' => 'Evolução',
    'city' => 'Cidade',
    'guildmark' => 'Guildmark'
];
?>
<div class="Right-side-news">
    <div class="letest-news">
        <div class="block-title">
            <div style="font-size:17pt;" class="news-title">
                <span>R</span>anking
            </div>
        </div>
        <div class="news-wrap" style="padding:10px; margin: 0 auto;">
            <div style="font-size:12pt;" id="content" style="padding:20px;">
                <?php if (isset($ranking_paginate) && is_array($ranking_paginate)) : ?>
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <?php foreach ($ranking_paginate[0] as $key => $value) : ?>
                                    <?php if (in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at'])) continue; ?>
                                    <th style="margin:10px;padding:10px;text-align:left;">
                                        <?= $translate[$key] ?>
                                    </th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ranking_paginate as $key => $value) : ?>
                                <tr>
                                    <?php foreach ($value as $key2 => $char) : ?>
                                        <?php if (in_array($key2, ['id', 'created_at', 'updated_at', 'deleted_at'])) continue; ?>
                                        <td style="margin:10px;padding:10px;text-align:left;">
                                            <?php if ($key2 == 'nick') : ?>
                                                <?= $char ?>
                                            <?php elseif ($key2 == 'level') : ?>
                                                <?= $char + 1 ?>
                                            <?php elseif ($key2 == 'evolution') : ?>
                                                <?= $evolution[$char] ?>
                                            <?php elseif ($key2 == 'class') : ?>
                                                <?= $class[$char] ?>
                                            <?php elseif ($key2 == 'kingdom') : ?>
                                                <?= $kingdom[$char] ?>
                                            <?php elseif ($key2 == 'guild') : ?>
                                                <?php $imguild = 'img_guilds/' . ('/b0' . (1000000 + $char)) . '.bmp' ?>
                                                <?php $defaultguild = 'img_guilds/b01000000.bmp' ?>
                                                <img src="<?= file_exists(FCPATH . $imguild) ? base_url($imguild) : base_url($defaultguild) ?>">
                                            <?php else : ?>
                                                <?= $char ?>
                                            <?php endif; ?>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    Aguardando atualização do ranking!
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div style="padding:10px">
        <?php if ($ranking_pager) : ?>
            <?= $ranking_pager->links('ranking', 'pagination') ?>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>
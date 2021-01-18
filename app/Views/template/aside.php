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
<div class="left-side-news" style="height: 1660px;">
    <div class="join-card">
        <p>JOIN OUR <b>DISCORD</b></p>
    </div>
    <div class="chat-discord" style="margin-left: 1px;">
        <iframe src="https://discordapp.com/widget?id=462709175890477056&amp;theme=dark" width="330" height="400" allowtransparency="true" frameborder="0"></iframe>
    </div>
    <div class="online-poll"><br /></div>
    <div class="join-card">
        <p><b>FACEBOOK</b> FANPAGE</p>
    </div>
    <div class="chat-discord" style="margin-left: 1px;">
        <div class="fb-page" data-href="https://www.facebook.com/L2-Exoplanet-106811564103836" data-tabs="timeline" data-width="330" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
    </div>
    <div class="join-card">
        <p><b>VOTE FOR</b> Exoplanet</p>
    </div>
    <div class="single-btn" style="margin-left: 0px;">
        <a target="_blank" href="https://vgw.hopzone.net/site/vote/103886/1" class="hvr-push"><img src="img/btn4.jpg" alt="" /></a>
    </div>
    <div class="single-btn" style="margin-left: 0px;">
        <a target="_blank" href="https://l2network.eu/index.php?a=in&amp;u=Dwarf" class="hvr-push"><img src="img/bgnet.jpg" alt="" /></a>
    </div>
    <div class="single-btn" style="margin-left: 0px;">
        <a target="_blank" href="https://l2top.co/vote/server/Exoplanet" class="hvr-push"><img src="img/btopco.jpg" alt="" /></a>
    </div>
    <div class="single-btn" style="margin-left: 0px;">
        <a target="_blank" href="https://la2.mmotop.ru/en/servers/34501/votes/new" class="hvr-push"><img src="img/bg77.jpg" alt="" /></a>
    </div>
    <div class="single-btn" style="margin-left: 0px;">
        <a target="_blank" href="http://wow.mmovote.ru/en/vote/2066" class="hvr-push"><img src="img/bgmmo2.jpg" alt="" /></a>
    </div>
</div>
<?php /*
<aside class="right-sitebar">
    <?php if (session()->has('login')) : ?>
        <div class="news-p">
            <div class="block-title">
                <div class="title">
                    <span>P</span>ainel do usuário
                </div>
            </div>
            <div class="last-more-fon">
                <div id="content">
                    <div id="box1">
                        <div id="content_center">
                            <div class="box-style1">
                                <div class="entry">
                                    <div style="text-align:center;padding:40px;">
                                        <a href="<?= base_url('dashboard/alterpass') ?>" style="display:block;background-color: rgba(155, 155, 155, 0.2); padding: 10px 30px;margin: 5px 0;">Alterar senha</a>
                                        <a href="<?= base_url('dashboard/numericpass') ?>" style="display:block;background-color: rgba(155, 155, 155, 0.2); padding: 10px 30px;margin: 5px 0;">Recuperar numérica</a>
                                        <a href="<?= base_url('dashboard/guildmark') ?>" style="display:block;background-color: rgba(155, 155, 155, 0.2); padding: 10px 30px;margin: 5px 0;">Guildmark</a>
                                        <a href="<?= base_url('dashboard/tickets') ?>" style="display:block;background-color: rgba(155, 155, 155, 0.2); padding: 10px 30px;margin: 5px 0;">Suporte</a>
                                        <a href="<?= base_url('dashboard/donate') ?>" style="display:block;background-color: rgba(155, 155, 155, 0.2); padding: 10px 30px;margin: 5px 0;">Doação</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (session()->get('login')['access'] == 3) : ?>
            <div class="news-p">
                <div class="block-title">
                    <div class="title">
                        <span>P</span>ainel Administrativo
                    </div>
                </div>
                <div class="last-more-fon">
                    <div id="content">
                        <div id="box1">
                            <div id="content_center">
                                <div class="box-style1">
                                    <div class="entry">
                                        <div style="text-align:center;padding:40px;">
                                            <a href="<?= base_url('admin/guides') ?>" style="display:block;background-color: rgba(155, 155, 155, 0.2); padding: 10px 30px;margin: 5px 0;">Guia do Jogo</a>
                                            <a href="<?= base_url('admin/donate') ?>" style="display:block;background-color: rgba(155, 155, 155, 0.2); padding: 10px 30px;margin: 5px 0;">Sistema de donate</a>
                                            <a href="<?= base_url('admin/news') ?>" style="display:block;background-color: rgba(155, 155, 155, 0.2); padding: 10px 30px;margin: 5px 0;">Sistema de notícias</a>
                                            <a href="<?= base_url('auth/droplist') ?>" style="display:block;background-color: rgba(155, 155, 155, 0.2); padding: 10px 30px;margin: 5px 0;">Atualizar droplist</a>
                                            <a href="<?= base_url('admin/config') ?>" style="display:block;background-color: rgba(155, 155, 155, 0.2); padding: 10px 30px;margin: 5px 0;">Configurações</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="news-p">
        <div class="block-title">
            <div class="title">
                <span>R</span>nking de Players
            </div>
        </div>
        <div class="last-more-fon">
            <div id="content">
                <div id="box1">
                    <div id="content_center">
                        <div class="box-style1">
                            <div class="entry">
                                <div style="text-align:center;">
                                    <?php if (isset($ranking) && is_array($ranking)) : ?>
                                        <table style="padding:5px;margin:5px;">
                                            <thead>
                                                <tr>
                                                    <?php foreach ($ranking[0] as $key => $value) : ?>
                                                        <?php if (in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at'])) continue; ?>
                                                        <th style="margin:10px;padding:2px;text-align:left;">
                                                            <?= $translate[$key] ?>
                                                        </th>
                                                    <?php endforeach; ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ranking as $key => $value) : ?>
                                                    <tr>
                                                        <?php foreach ($value as $key2 => $char) : ?>
                                                            <?php if (in_array($key2, ['id', 'created_at', 'updated_at', 'deleted_at'])) continue; ?>
                                                            <td style="padding:7px;text-align:left;">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="news-p">
        <div class="block-title">
            <div class="title">
                <span>R</span>nking de Cidades
            </div>
        </div>
        <div class="last-more-fon">
            <div id="content">
                <div id="box1">
                    <div id="content_center">
                        <div class="box-style1">
                            <div class="entry">
                                <div style="text-align:center;">
                                    <?php if ($rankcity && is_array($rankcity)) : ?>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <?php foreach ($rankcity[0] as $key => $value) : ?>
                                                        <?php if (in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at'])) continue; ?>
                                                        <th style="margin:10px;padding:10px;text-align:left;">
                                                            <?= $translate[$key] ?>
                                                        </th>
                                                    <?php endforeach; ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($rankcity as $key => $value) : ?>
                                                    <tr>
                                                        <?php foreach ($value as $key2 => $guild) : ?>
                                                            <?php if (in_array($key2, ['id', 'created_at', 'updated_at', 'deleted_at'])) continue; ?>
                                                            <td style="margin:10px;padding:10px;text-align:left;">
                                                                <?php if ($key2 == 'city') : ?>
                                                                    <?= $guild ?>
                                                                <?php elseif ($key2 == 'guild') : ?>
                                                                    <?= $guild ?>
                                                                <?php elseif ($key2 == 'guildmark') : ?>
                                                                    <?php $imguild = 'img_guilds/' .  $guild ?>
                                                                    <?php $defaultguild = 'img_guilds/b01000000.bmp' ?>
                                                                    <img src="<?= file_exists(FCPATH . $imguild) ? base_url($imguild) : base_url($defaultguild) ?>">
                                                                <?php else : ?>
                                                                    <?= $guild ?>
                                                                <?php endif; ?>
                                                            </td>
                                                        <?php endforeach; ?>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php else : ?>
                                        Aguardando atualização do rank de guilds!
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>*/ ?>
<?php $uri = $uri = new \CodeIgniter\HTTP\URI(current_url(true)); ?>
<div class="fire"></div>
<header class="header">
    <div class="logo">
        <a href="#"></a>
    </div>
    <div class="download-button">
        <button type="button">
            <span>DOWNLOAD</span>
            Game Client
        </button>
    </div>
    <div class="header-menu">
        <ul class="menu">
            <li class="<?= $uri->getPath() == '/site' ? 'menu-active' : ($uri->getPath() == '/' ? 'menu-active' : '') ?>">
                <a href="<?= base_url('site') ?>">Home</a>
            </li>
            <li class="<?= $uri->getPath() == '/site/ranking' ? 'menu-active' : '' ?>">
                <a href="<?= base_url('site/ranking') ?>">Ranking</a>
            </li>
            <li class="<?= $uri->getPath() == '/site/guides' ? 'menu-active' : '' ?>">
                <a href="<?= base_url('site/guides') ?>">Guia do Jogo</a>
            </li>
        </ul>
        <div class="play-now">
            <a href="<?= base_url('site/register') ?>">
                <span>Jogue Agora</span>
            </a>
        </div>
        <ul class="menu">
            <li class="<?= $uri->getPath() == '/site/droplist' ? 'menu-active' : '' ?>">
                <a href="<?= base_url('site/droplist') ?>">Droplist</a>
            </li>
            <li>
                <a href="" target="_blank">Discord</a>
            </li>
            <li>
                <a href="" target="_blank">Facebook</a>
            </li>
        </ul>
    </div>
</header>
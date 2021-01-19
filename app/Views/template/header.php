<?php $uri = $uri = new \CodeIgniter\HTTP\URI(current_url(true)); ?>
<header>
    <div class="container">
        <div class="mainmenu">
            <ul>
                <li>
                    <a href="<?= base_url('site') ?>" class="hvr-sink" style="<?= $uri->getPath() == '/site' ? 'color: #ffe739;text-shadow: 0 0 15px #fde851;' : ($uri->getPath() == '/' ? 'color: #ffe739;text-shadow: 0 0 15px #fde851;' : '') ?>">HOME</a>
                </li>
                <li>
                    <a style="<?= $uri->getPath() == '/site/downloads' ? 'color: #ffe739;text-shadow: 0 0 15px #fde851;' : '' ?>" href="<?= base_url('site/downloads') ?>" class="hvr-sink">DOWNLOADS</a>
                </li>
                <li>
                    <a style="<?= $uri->getPath() == '/site/ranking' ? 'color: #ffe739;text-shadow: 0 0 15px #fde851;' : '' ?>" href="<?= base_url('site/ranking') ?>" class="hvr-sink">RANKING</a>
                </li>
                <li>
                    <a style="<?= $uri->getPath() == '/site/guides' ? 'color: #ffe739;text-shadow: 0 0 15px #fde851;' : '' ?>" href="<?= base_url('site/guides') ?>" class="hvr-sink">GUIA DO JOGO</a>
                </li>
                <li>
                    <a style="<?= $uri->getPath() == '/site/droplist' ? 'color: #ffe739;text-shadow: 0 0 15px #fde851;' : '' ?>" href="<?= base_url('site/droplist') ?>" class="hvr-sink">DROPLIST</a>
                </li>
                <li>
                    <a style="<?= $uri->getPath() == '/dashboard/donate' ? 'color: #ffe739;text-shadow: 0 0 15px #fde851;' : '' ?>" href="<?= base_url('dashboard/donate') ?>" class="hvr-sink" style="border-right:none">DOAÇÕES</a>
                </li>
            </ul>
        </div>
        <div class="country-select">
            <?php if (!session()->has('login')) : ?>
                <a href="<?= base_url('site/login') ?>" style="color:white;padding:20px;font-size:11px;" class="active">
                    <span>
                        <i class="fas fa-user"></i>
                        Login
                    </span>
                </a>
                <a href="<?= base_url('site/register') ?>" style="color:white;padding:20px;font-size:11px;" class="">
                    <span>
                        <i class="fas fa-user"></i>
                        Cadastrar
                    </span>
                </a>
            <?php else : ?>
                <a href="<?= base_url('dashboard') ?>" style="color:white;padding:20px;font-size:11px;" class="">
                    <span>
                        <i class="fas fa-user"></i>
                        Dashboard
                    </span>
                </a>
                <a href="<?= base_url('dashboard/logout') ?>" style="color:white;padding:20px;font-size:11px;" class="">
                    <span>
                        <i class="fas fa-user"></i>
                        Sair
                    </span>
                </a>
            <?php endif; ?>
        </div>
</header>
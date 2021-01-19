<?= $this->extend('dashboard/layouts') ?>
<?= $this->section('page') ?>
<div class="Right-side-news">
    <div class="letest-news">
        <div class="block-title">
            <div class="news-title">
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
                                    <span>Bem vindo novamente, <?= session()->get('login')['username'] ?></span>
                                </div>
                                <div style="text-align:center;" class="display:block;">
                                    <a href="<?= base_url('dashboard') ?>">
                                        Dashboard
                                    </a>
                                </div>
                                <div style="text-align:center;" class="display:block;">
                                    <a href="<?= base_url('dashboard/alterpass') ?>">
                                        Alterar senha
                                    </a>
                                </div>
                                <div style="text-align:center;" class="display:block;">
                                    <a href="<?= base_url('dashboard/donate') ?>">
                                        Doação
                                    </a>
                                </div>
                                <div style="text-align:center;" class="display:block;">
                                    <a href="<?= base_url('dashboard/guildmark') ?>">
                                        Guildmark
                                    </a>
                                </div>
                                <div style="text-align:center;" class="display:block;">
                                    <a href="<?= base_url('dashboard/numericpass') ?>">
                                        Recuperar numérica
                                    </a>
                                </div>
                                <div style="text-align:center;" class="display:block;">
                                    <a href="<?= base_url('dashboard/tickets') ?>">
                                        Suporte
                                    </a>
                                </div>
                                <?php if (session()->get('login')['access'] == 3) : ?>
                                    <div style="text-align:center;" class="display:block;">
                                        <a href="<?= base_url('admin/configuration') ?>">
                                            Configurações
                                        </a>
                                    </div>
                                    <div style="text-align:center;" class="display:block;">
                                        <a href="<?= base_url('admin/guides') ?>">
                                            Guia do jogo
                                        </a>
                                    </div>
                                    <div style="text-align:center;" class="display:block;">
                                        <a href="<?= base_url('admin/donate') ?>">
                                            Pacote de Donate
                                        </a>
                                    </div>
                                    <div style="text-align:center;" class="display:block;">
                                        <a href="<?= base_url('admin/news') ?>">
                                            Notícias
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
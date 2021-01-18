<?= $this->extend('dashboard/layouts') ?>
<?= $this->section('page') ?>
<main class="content">
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
                                    <span>Bem vindo novamente, <?= session()->get('login')['username'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
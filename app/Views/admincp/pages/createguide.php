<?= $this->extend('admincp/layouts') ?>
<?= $this->section('page') ?>
<main class="content">
    <div class="news-p">
        <div class="block-title">
            <div class="title">
                <span>C</span>riação de guias
            </div>
        </div>
        <form method="POST" id="loginForm" action="<?= base_url('auth/createguide') ?>">
            <div class="block" style="margin:10px;text-align:center;">
                <input id="name" type="text" name="name" placeholder="Nome do guia" required />
            </div>
            <div class="block" style="margin:10px;text-align:center;">
                <textarea style="margin:10px;" name="content" class="editor"></textarea>
            </div>
            <div class="block" style="margin:10px;text-align:center;">
                <?php if (isset($recaptcha)) : ?>
                    <div class="text-center">
                        <div style="margin: 0 auto;text-align:Center;" class="g-recaptcha" data-sitekey="<?= $recaptcha ?>"></div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="clearfix"></div>
            <div style="text-align:center;margin: 0 auto;" class="login-button2">
                <button type="submit">
                    <span class="text"> Criar </span>
                </button>
            </div>
        </form>
    </div>
</main>
<?= $this->endSection() ?>
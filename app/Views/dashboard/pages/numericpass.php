<?= $this->extend('dashboard/layouts') ?>
<?= $this->section('page') ?>
<main class="content">
    <div class="news-p">
        <div class="block-title">
            <div class="title">
                <span>R</span>ecuperação de numérica
            </div>
        </div>
        <form method="POST" action="<?= base_url('auth/numericpass') ?>" id="loginForm">
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
                    <span class="text"> Recuperar </span>
                </button>
            </div>
        </form>
    </div>
</main>
<?= $this->endSection() ?>
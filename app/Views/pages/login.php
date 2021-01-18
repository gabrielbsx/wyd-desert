<?= $this->extend('layouts') ?>
<?= $this->section('page') ?>
<main class="content">
    <div class="news-p">
        <div class="block-title">
            <div class="title">
                <span>L</span>ogin
            </div>
        </div>
        <form method="POST" action="<?= base_url('auth/login') ?>" id="loginForm">
            <div class="block" style="margin:10px;text-align:center;">
                <input type="text" id="emailType" name="username" placeholder="Usuário" />
            </div>
            <div class="block" style="margin:10px;text-align:center;">
                <input type="password" id="emailType" name="password" placeholder="Senha" />
            </div>
            <div class="block" style="margin:10px;text-align:center;">
                <?php if (isset($recaptcha)) : ?>
                    <div class="text-center">
                        <div style="margin: 0 auto;text-align:Center;" class="g-recaptcha" data-sitekey="<?= $recaptcha ?>"></div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="clearfix"></div>
            <div style="margin:20px;text-align:center;" class="form-group">
                <a style="" href="<?= base_url('site/recovery') ?>">Esqueci minha conta</a>
            </div>
            <div class="clearfix"></div>
            <div style="text-align:center;margin: 0 auto;" class="login-button2">
                <button type="submit">
                    <span class="text"> Entrar </span>
                </button>
            </div>
        </form>
    </div>
</main>
<?= $this->endSection() ?>
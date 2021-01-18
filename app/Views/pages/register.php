<?= $this->extend('layouts') ?>
<?= $this->section('page') ?>
<main class="content">
    <div class="news-p">
        <div class="block-title">
            <div class="title">
                <span>C</span>adastrar
            </div>
        </div>
        <form method="POST" action="<?= base_url('auth/register') ?>" id="loginForm">
            <div class="block" style="margin:10px;text-align:center;">
                <input type="text" id="emailType" name="username" placeholder="Usuário" />
            </div>
            <div class="block" style="margin:10px;text-align:center;">
                <input type="email" id="emailType" name="email" placeholder="Email" />
            </div>
            <div class="block" style="margin:10px;text-align:center;">
                <input type="password" id="emailType" name="password" placeholder="Senha" />
            </div>
            <div class="block" style="margin:10px;text-align:center;">
                <input type="password" id="emailType" name="password_confirm" placeholder="Confirmar senha" />
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
                    <span class="text"> Cadastrar </span>
                </button>
            </div>
        </form>
    </div>
</main>
<?= $this->endSection() ?>
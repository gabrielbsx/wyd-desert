<?= $this->extend('dashboard/layouts') ?>
<?= $this->section('page') ?>
<div  class="Right-side-news">
    <div style="margin:10px;" class="letest-news">
        <div class="block-title">
            <div class="news-title">
                <span>A</span>lteração de senha
            </div>
        </div>
        <form method="POST" action="<?= base_url('auth/alterpass') ?>" id="loginForm">
            <div class="block" style="margin:10px;text-align:center;">
                <input style="border: 1px solid gray;padding:10px;" type="password" id="emailType" name="oldpassword" placeholder="Senha antiga" />
            </div>
            <div class="block" style="margin:10px;text-align:center;">
                <input style="border: 1px solid gray;padding:10px;" type="password" id="emailType" name="password" placeholder="Nova senha" />
            </div>
            <div class="block" style="margin:10px;text-align:center;">
                <input style="border: 1px solid gray;padding:10px;" type="password" id="emailType" name="password_confirm" placeholder="Repetir nova senha" />
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
                    <span class="text"> Alterar senha </span>
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->extend('layouts') ?>
<?= $this->section('page') ?>
<div class="Right-side-news">
    <div class="letest-news">
        <div class="block-title">
            <div style="font-size:17pt;" class="news-title">
                <span>R</span>ecuperar conta
            </div>
        </div>
        <form style="font-size:13pt;" method="POST" action="<?= base_url('auth/recovery') ?>" id="loginForm">
            <div class="block" style="margin:10px;text-align:center;">
                <input style="border: 1px solid gray;" type="email" id="emailType" name="email" placeholder="Email" />
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
                    <span class="text"> Recuperar </span>
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
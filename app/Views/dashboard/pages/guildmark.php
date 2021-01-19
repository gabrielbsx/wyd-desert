<?= $this->extend('dashboard/layouts') ?>
<?= $this->section('page') ?>
<div class="Right-side-news">
    <div class="letest-news">
        <div class="block-title">
            <div class="news-title">
                <span>E</span>nvio de guildmark
            </div>
        </div>
        <form method="POST" action="<?= base_url('auth/guildmark') ?>" id="loginForm">
            <div class="block" style="margin:10px;text-align:center;">
                <input style="border: 1px solid gray; padding:10px;" type="number" name="guildid" placeholder="Guild ID" required />
            </div>
            <div class="block" style="margin:10px;text-align:center;">
                <input style="border:none;background:transparent;" type="file" accept="image/bmp" name="guildmark" required />
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
                    <span class="text"> Enviar </span>
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
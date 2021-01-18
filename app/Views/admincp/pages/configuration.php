<?= $this->extend('admincp/layouts') ?>
<?= $this->section('page') ?>
<main class="content">
    <div class="news-p">
        <div class="block-title">
            <div class="title">
                <span>C</span>onfigurações
            </div>
        </div>
        <?php if (isset($configuration)) : ?>
            <form method="POST" action="<?= base_url('auth/config') ?>" id="loginForm">
                <?php foreach ($configuration as $key => $value) : ?>
                    <?php if (in_array($key, ['deleted_at', 'created_at', 'updated_at', 'id'])) continue; ?>
                    <div class="block" style="margin:10px;text-align:center;">
                        <label style="display:block;"><?= str_replace('_', ' ', $key) ?></label>
                        <input type="text" style="width:100%;" name="<?= $key ?>" placeholder="<?= $key ?>" value="<?= $value ?>" />
                    </div>
                <?php endforeach; ?>
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
                        <span class="text"> Salvar </span>
                    </button>
                </div>
            </form>
        <?php else : ?>

        <?php endif; ?>
    </div>
</main>
<?= $this->endSection() ?>
<?= $this->extend('layouts') ?>
<?= $this->section('page') ?>
<main class="content">
    <div class="news-p">
        <div class="block-title">
            <div class="title">
                <span>C</span>riação de Ticket
            </div>
        </div>
        <form method="POST" action="<?= base_url('auth/createticket') ?>" id="loginForm">
            <div class="block" style="margin:10px;text-align:center;">
                <input id="title" type="text" name="title" placeholder="Título" required />
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
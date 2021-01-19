<?= $this->extend('admincp/layouts') ?>
<?= $this->section('page') ?>
<div class="Right-side-news">
    <div class="letest-news">
        <div class="block-title">
            <div class="news-title">
                <span>E</span>ditar artigo do guia
            </div>
        </div>
        <form method="POST" id="loginForm" action="<?= base_url('auth/editguide') ?>">
            <div class="block" style="margin:10px;text-align:center;">
                <input type="text" style="border: 1px solid gray;padding:10px;" name="title" value="<?= $article['title'] ?>">
            </div>
            <div class="block" style="margin:10px;text-align:center;">
                <textarea name="article" class="editor"><?= $article['article'] ?></textarea>
            </div>
            <input type="hidden" name="id" value="<?= $article['id'] ?>">
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
                    <span class="text"> Editar </span>
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
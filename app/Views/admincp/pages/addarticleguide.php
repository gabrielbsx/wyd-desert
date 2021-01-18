<?= $this->extend('admincp/layouts') ?>
<?= $this->section('page') ?>
<div class="content-more-news">
    <div class="last-more-top">
        Título do artigo para o guia
    </div>
    <div class="last-more-fon" style="margin: 0 auto;">
        <form id="login_form" class="login-form block-p" method="POST" action="<?= base_url('auth/addarticleguide') ?>">
            <div class="input-user">
                <input type="text" name="title" placeholder="Título do artigo para o guia">
            </div>
            <textarea name="article" style="margin:10px;" class="editor">
            </textarea>
            <input type="hidden" name="id_guide" value="<?= $id ?>">
            <div class="block" style="margin:10px;text-align:center;">
                <?php if (isset($recaptcha)) : ?>
                    <div class="text-center">
                        <div style="margin: 0 auto;text-align:Center;" class="g-recaptcha" data-sitekey="<?= $recaptcha ?>"></div>
                    </div>
                <?php endif; ?>
            </div>
            <button style="text-align:center;margin:0 auto;margin-top:10px;" type="submit">
                Adicionar artigo
            </button>
        </form>
        <a href="<?= base_url('admin/guides') ?>">
            <button style="text-align:center;margin:0 auto;margin-top:10px;">
                Voltar
            </button>
        </a>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->extend('admincp/layouts') ?>
<?= $this->section('page') ?>
<div class="Right-side-news">
    <div class="letest-news">
        <div class="news-title">
            Título do artigo para o guia
        </div>
        <div class="last-more-fon" style="margin: 0 auto;padding:10px;">
            <form id="login_form" class="login-form block-p" method="POST" action="<?= base_url('auth/addarticleguide') ?>">
                <div class="input-user" style="text-align:center;">
                    <input type="text" style="border:1px solid gray; padding:10px;" name="title" placeholder="Título do artigo para o guia">
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
                <div class="block" style="margin:10px;text-align:center;">
                    <button style="text-align:center;margin:0 auto;margin-top:10px;" type="submit">
                        Adicionar artigo
                    </button>
                </div>
            </form>
            <a href="<?= base_url('admin/guides') ?>">
                <div class="block" style="margin:10px;text-align:center;">
                    <button style="text-align:center;margin:0 auto;margin-top:10px;">
                        Voltar
                    </button>
                </div>
            </a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
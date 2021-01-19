<?= $this->extend('admincp/layouts') ?>
<?= $this->section('page') ?>
<div class="Right-side-news">
    <div class="letest-news">
        <div class="block-title">
            <div class="news-title">
                <span>C</span>riação de notícias
            </div>
        </div>
        <form method="POST" id="loginForm" action="<?= base_url('auth/createnews') ?>">
            <div class="block" style="margin:10px;text-align:center;">
                <input style="border: 1px solid gray;padding:10px;" id="title" type="text" name="title" placeholder="Título" required />
            </div>
            <div class="block" style="margin:10px;text-align:center;">
                <textarea style="margin:10px;" name="content" class="editor"></textarea>
            </div>
            <div class="block" style="margin:10px;text-align:center;">
                <label style="display:block;text-align:center;margin:10px;">Categorias</label>
                <select style="color:black;" name="category">
                    <option value="1">Notícia</option>
                    <option value="2">Manutenção</option>
                    <option value="3">Evento</option>
                    <option value="4">Atualização</option>
                </select>
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
</div>
<?= $this->endSection() ?>
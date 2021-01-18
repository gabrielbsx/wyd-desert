<?= $this->extend('admincp/layouts') ?>
<?= $this->section('page') ?>
<main class="content">
    <div class="news-p">
        <div class="block-title">
            <div class="title">
                <span>E</span>ditor de Notícias
            </div>
        </div>
        <div class="last-more-fon">
            <div id="content">
                <?php if (isset($news)) : ?>
                    <form id="login_form" class="login-form block-p" method="POST" action="<?= base_url('auth/editnews') ?>">
                        <div class="block" style="margin:10px;text-align:center;">
                            <input type="text" name="title" value="<?= $news['title'] ?>" />
                        </div>
                        <textarea class="editor" name="content"><?= $news['content'] ?></textarea>
                        <div class="block" style="margin:10px;text-align:center;">
                            <label style="margin:10px;text-align:center;display:block;">Categorias</label>
                            <select style="margin:10px;text-align:center;color:black;" name="category">
                                <option value="1" <?= $news['category'] == 1 ? 'selected' : '' ?>>Notícia</option>
                                <option value="2" <?= $news['category'] == 2 ? 'selected' : '' ?>>Manutenção</option>
                                <option value="3" <?= $news['category'] == 3 ? 'selected' : '' ?>>Evento</option>
                                <option value="4" <?= $news['category'] == 4 ? 'selected' : '' ?>>Atualização</option>
                            </select>
                        </div>
                        <input type="hidden" name="id" value="<?= $news['id'] ?>">
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
                <?php else : ?>
                    <div style="margin:10px;text-align:center;">
                        Notícia inexistente
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
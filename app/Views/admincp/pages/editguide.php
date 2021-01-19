<?= $this->extend('admincp/layouts') ?>
<?= $this->section('page') ?>
<div class="Right-side-news">
    <div class="letest-news">
        <div class="block-title">
            <div class="news-title">
                <span>E</span>ditor de guias
            </div>
        </div>
        <?php if (isset($guide)) : ?>
            <form method="POST" id="loginForm" action="<?= base_url('auth/editguide') ?>">
                <div class="block" style="margin:10px;text-align:center;">
                    <input style="border: 1px solid gray; padding:10px;" id="name" type="text" name="name" placeholder="Nome do guia" value="<?= $guide['name'] ?>" required />
                </div>
                <input type="hidden" name="id" value="<?= $guide['id'] ?>">
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
            <div style="text-align:center;">
                Guia inexistente
            </div>
        <?php endif; ?>
    </div>

    <div class="news-p" style="padding:10px;">
        <div class="block-title">
            <div class="news-title">
                <span>E</span>ditor de artigos do guia
            </div>
        </div>
        <?php if ($paginate_articles) : ?>
            <?php foreach ($paginate_articles as $key => $value) : ?>
                <div style="display:inline-block;width:100%;background-color:rgb(55,55,55);margin-top: 10px;">
                    <div style="padding:10px;display:flex;">
                        <span style="padding:10px;color:white;">
                            <?= $value['title'] ?>
                        </span>
                        <div style="display:flex;margin-left:auto;">
                            <a href="<?= base_url('admin/editarticleguide/' . $value['id']) ?>" style="background-color:rgb(25,25,75);padding:10px 20px;color:White;">
                                Alterar Artigo
                            </a>
                            <a href="<?= base_url('auth/delarticleguide/' . $value['id']) ?>" style="background-color:rgb(75,25,25);padding:10px 20px;color:White;">
                                Deletar Artigo
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div style="margin:10px;">
                <?php if ($pager_articles) : ?>
                    <?= $pager_articles->links('articles', 'pagination') ?>
                <?php endif; ?>
            </div>
        <?php else : ?>
            <div style="text-align:center;">
                Não há artigos nesse guia!
            </div>
        <?php endif; ?>
    </div>
</main>
<?= $this->endSection() ?>
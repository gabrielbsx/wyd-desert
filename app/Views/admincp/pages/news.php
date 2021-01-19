<?= $this->extend('admincp/layouts') ?>
<?= $this->section('page') ?>
<div class="Right-side-news">
    <div class="letest-news">
        <div class="block-title">
            <div class="news-title">
                <span>S</span>istema de Notícias
            </div>
        </div>
        <div class="news-block" style="padding:10px;">
            <div id="content">
                <div style="margin:10px 0;text-align:center;">
                    <a href="<?= base_url('admin/createnews') ?>" style="background-color:rgb(55,55,55);padding:10px 20px;display:block;text-align:center;margin:0 auto;color: white;">Adicionar nova notícia</a>
                </div>
                <?php if ($paginate_news) : ?>
                    <?php foreach ($paginate_news as $key => $value) : ?>
                        <div style="display:inline-block;width:100%;background-color:rgb(55,55,55);margin-top: 10px;color: white;">
                            <div style="padding:10px;display:flex;">
                                <span style="padding:10px;color:white;">
                                    <?= $value['title'] ?>
                                </span>
                                <div style="display:flex;margin-left:auto;">
                                    <a href="<?= base_url('admin/editnews/' . $value['id']) ?>" style="background-color:rgb(25,75,25);padding:10px 20px;color: white;">
                                        Editar
                                    </a>
                                    <a href="<?= base_url('auth/delnews/' . $value['id']) ?>" style="background-color:rgb(75,25,25);padding:10px 20px;color: white;">
                                        Deletar
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div style="padding:10px;">
                        <?php if ($pager_news) : ?>
                            <?= $pager_news->links('guides', 'pagination') ?>
                        <?php endif; ?>
                    </div>
                <?php else : ?>
                    Não há notícias!
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
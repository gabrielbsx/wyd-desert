<?= $this->extend('admincp/layouts') ?>
<?= $this->section('page') ?>
<main class="content">
    <div class="news-p">
        <div class="block-title">
            <div class="title">
                <span>S</span>istema de Doação
            </div>
        </div>
        <div class="last-more-fon">
            <div id="content">
                <div style="margin:10px 0;text-align:center;">
                    <a href="<?= base_url('admin/packagedonate') ?>" style="background-color:rgb(55,55,55);padding:10px 20px;display:block;text-align:center;margin:0 auto;">Adicionar novo pacote</a>
                </div>
                <?php if ($paginate_package) : ?>
                    <?php foreach ($paginate_package as $key => $value) : ?>
                        <div style="display:inline-block;width:100%;background-color:rgb(55,55,55);margin-top: 10px;">
                            <div style="padding:10px;display:flex;">
                                <span style="padding:10px;color:white;">
                                    <?= $value['name'] ?>
                                </span>
                                <div style="display:flex;margin-left:auto;">
                                    <a href="<?= base_url('admin/additem/' . $value['id']) ?>" style="background-color:rgb(25,25,75);padding:10px 20px;">
                                        Adicionar Item
                                    </a>
                                    <a href="<?= base_url('admin/editpackage/' . $value['id']) ?>" style="background-color:rgb(25,75,25);padding:10px 20px;">
                                        Editar
                                    </a>
                                    <a href="<?= base_url('auth/delpackage/' . $value['id']) ?>" style="background-color:rgb(75,25,25);padding:10px 20px;">
                                        Deletar
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div style="padding:10px;">
                        <?php if ($pager_package) : ?>
                            <?= $pager_package->links('package', 'pagination') ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
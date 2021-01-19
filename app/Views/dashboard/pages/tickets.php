<?= $this->extend('dashboard/layouts') ?>
<?= $this->section('page') ?>
<div class="Right-side-news">
    <div class="letest-news">
        <div class="block-title">
            <div class="news-title">
                <span>S</span>uporte
            </div>
        </div>
        <div class="last-more-fon">
            <div id="content">
                <div id="box1">
                    <div id="content_center">
                        <div class="box-style1" style="padding:10px;">
                            <div class="entry">
                                <div style="margin:10px 0;text-align:center;">
                                    <a href="<?= base_url('dashboard/createticket') ?>" style="background-color:rgb(55,55,55);color:white;padding:10px 20px;display:block;text-align:center;margin:0 auto;">
                                        Adicionar novo ticket
                                    </a>
                                </div>
                                <div style="margin:10px 0;text-align:center;">
                                    <?php if ($paginate_tickets) : ?>
                                        <?php foreach ($paginate_tickets as $key => $value) : ?>
                                            <div style="display:inline-block;width:100%;background-color:rgb(55,55,55);margin-top: 10px;">
                                                <div style="padding:10px;display:flex;">
                                                    <span style="padding:10px;color:White;">
                                                        <?= $value['title'] ?>
                                                    </span>
                                                    <div style="display:flex;margin-left:auto;">
                                                        <a href="<?= base_url('dashboard/answerticket/' . $value['id']) ?>" style="background-color:rgb(25,25,75);padding:10px 20px;color:white;">
                                                            Abrir
                                                        </a>
                                                        <?php if ($value['status'] == 0) : ?>
                                                            <div style="background-color:rgb(75,75,25);padding:10px 20px;color:White;">
                                                                Pendente
                                                            </div>
                                                        <?php else : ?>
                                                            <div style="background-color:rgb(75,25,25);padding:10px 20px;color:White;">
                                                                Encerrado
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php if ($pager_tickets) : ?>
                                            <?= $pager_tickets->links('tickets', 'pagination') ?>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <div style="text-align:center;">
                                            Não há ticket!
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
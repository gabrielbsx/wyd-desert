<?= $this->extend('layouts') ?>
<?= $this->section('page') ?>
<main class="content">
    <div class="news-p">
        <div class="block-title">
            <div class="title">
                <span>G</span>uia do Jogo
            </div>
        </div>
        <div class="last-more-fon">
            <?php foreach ($guides as $key => $value) : ?>
                <div style="display:inline-block;width:100%;background-color:rgb(55,55,55);margin-top: 10px;">
                    <div style="width:100%;padding:10px;text-align:center;background-color:rgb(25,25,25);">
                        <?= $value['name'] ?>
                    </div>
                    <div style="padding:20px;display:inline-block;">
                        <div style="display:flex;margin-left:auto;">
                            <?php if (count($value['articles']) > 0) : ?>
                                <?php foreach ($value['articles'] as $key2 => $value2) : ?>
                                    <div>
                                        <a style="padding: 10px 20px; background-color:rgb(25,25,25);margin:5px;" href="<?= base_url('/site/article/' . $value2['id']) ?>">
                                            <?= $value2['title'] ?>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div>
                                    Não há artigos nesse guia
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
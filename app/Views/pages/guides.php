<?= $this->extend('layouts') ?>
<?= $this->section('page') ?>
<div class="Right-side-news">
    <div class="letest-news">
        <div class="block-title">
            <h1 style="font-size:18pt;" class="news-title">
                <span>G</span>uia do Jogo
            </h1>
        </div>
        <div style="font-size:12pt;padding:10px;" class="news-wrap" style="padding:20px;">
            <?php foreach ($guides as $key => $value) : ?>
                <div style="display:inline-block;background-color:rgb(55,55,55);margin-top: 10px;">
                    <div style="padding:10px;text-align:center;background-color:rgb(25,25,25);color:white;">
                        <?= $value['name'] ?>
                    </div>
                    <div style="padding:20px;display:inline-block;">
                        <div style="display:flex;margin-left:auto;">
                            <?php if (count($value['articles']) > 0) : ?>
                                <?php foreach ($value['articles'] as $key2 => $value2) : ?>
                                    <div>
                                        <a style="padding: 10px 20px; background-color:rgb(25,25,25);margin:5px;color:white;" href="<?= base_url('/site/article/' . $value2['id']) ?>">
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
</div>
<?= $this->endSection() ?>
<?= $this->extend('layouts') ?>
<?= $this->section('page') ?>
<div class="Right-side-news">
    <div class="letest-news">
        <?php if (isset($article)) : ?>
            <div class="news-p">
                <div class="block-title">
                    <div style="font-size:17pt;" class="news-title">
                        <span><?= $article['title'][0] ?></span><?= substr($article['title'], 1) ?>
                    </div>
                </div>
                <div style="font-size:13pt;padding:10px;" class="news-wrap articleb" style="padding:10px;overflow:hidden;display:inline-block;object-fit: contain;">
                    <?= $article['article'] ?>
                </div>
            </div>
        <?php else : ?>
            <div class="last-more-fon" style="margin: 0 auto;">
                Artigo inexistente
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>
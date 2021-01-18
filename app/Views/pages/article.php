<?= $this->extend('layouts') ?>
<?= $this->section('page') ?>
<main class="content">
    <?php if (isset($article)) : ?>
        <div class="news-p">
            <div class="block-title">
                <div class="title">
                    <span><?= $article['title'][0] ?></span><?= substr($article['title'], 1) ?>
                </div>
            </div>
            <div class="last-more-fon" style="padding:10px;overflow:hidden;">
                <?= $article['article'] ?>
            </div>
        </div>
    <?php else : ?>
        <div class="last-more-fon" style="margin: 0 auto;">
            Artigo inexistente
        </div>
    <?php endif; ?>
</main>
<?= $this->endSection() ?>
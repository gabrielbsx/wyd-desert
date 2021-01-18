<?= $this->extend('layouts') ?>
<?= $this->section('page') ?>
<main class="content">
    <div class="news-p">
        <?php if (isset($news)) : ?>
            <div class="block-title">
                <div class="title">
                    <span><?= $news['title'][0] ?></span><?= substr($news['title'], 1) ?>
                </div>
            </div>
            <div class="last-more-fon">
                <div id="content" style="padding:20px;">
                    <p style="text-align:center">
                        <?= $news['content'] ?>
                    </p>
                </div>
            </div>
        <?php else : ?>
            <div class="last-more-fon">
                <div id="content" style="padding:20px;">
                    Não há notícia cadastrada!
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>
<?= $this->endSection() ?>
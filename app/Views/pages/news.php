<?= $this->extend('layouts') ?>
<?= $this->section('page') ?>
<div class="Right-side-news">
    <div class="letest-news">
        <div class="letest-news-warp">
            <?php if (isset($news)) : ?>
                <div class="news-title">
                    <h1><span><?= $news['title'] ?></span></h1>
                </div>
                <div class="news-warp">
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
    </div>
</div>
<?= $this->endSection() ?>
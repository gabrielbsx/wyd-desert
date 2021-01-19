<?= $this->extend('layouts') ?>
<?= $this->section('page') ?>
<div class="Right-side-news">
    <div class="letest-news">
        <div class="letest-news-warp">
            <div class="news-title">
                <h1><span>Notícias</span></h1>
            </div>
            <div class="news-warp">
                <?php if ($news_paginate) : ?>
                    <?php foreach ($news_paginate as $key => $value) : ?>
                        <a href="<?= base_url('site/news/' . $value['id']) ?>" class="single-news">
                            <div class="">
                                <img style="width:7vw;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ8bhi91SEMwBm5QiTI9DzMd__C8_PjbgsKHA&usqp=CAU" />
                            </div>
                            <div class="news-txt">
                                <h4><?= $value['title'] ?></h4>
                                <li style="border-right: 0;">Postado <span style="color: #4a3737;"><?= $value['updated_at'] ?? $value['created_at'] ?></span></li>
                            </div>
                        </a>
                    <?php endforeach; ?>
                    <?php if ($news_pager) : ?>
                        <?= $news_pager->links('news', 'pagination') ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
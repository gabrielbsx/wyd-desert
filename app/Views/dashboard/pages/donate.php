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
            <div id="content" style="padding:20px;">
                Escrever os termos aqui
                <div style="margin:0 auto;margin-top:20px;text-align:center;">
                    <a style="background-color:rgba(55,55,55,1);padding: 10px 30px;color:white;" href="<?= base_url('dashboard/donation') ?>">Concordo com os termos</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
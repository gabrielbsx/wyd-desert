<!DOCTYPE html>
<html lang="pt">
<?= view('template/head') ?>

<body>
    <?= view('template/header') ?>
    <div class="header-bottom-main">
        <div class="header-bottom-rea">
        </div>
    </div>
    <div class="main-area">
        <div class="container">
            <div class="news-area">
                <?php /* view('template/blocks') */?>
                <?= view('template/aside') ?>
                <?= view('template/message') ?>
                <?= $this->renderSection('page') ?>
            </div>
        </div>
    </div>
    <?= view('template/footer') ?>
    <?= view('template/scripts') ?>
</body>

</html>
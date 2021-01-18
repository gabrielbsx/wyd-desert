<!DOCTYPE html>
<html lang="pt">
<?= view('template/head') ?>

<body>
    <div class="body-top">
        <div class="body-bottom">
            <?= view('template/header') ?>
            <div class="wrapper">
                <?= view('template/navbar') ?>
                <?= view('template/message') ?>
                <div class="container">
                    <div class="c-container">
                        <?= $this->renderSection('page') ?>
                        <?= view('template/aside') ?>
                    </div>
                </div>
                <?= view('template/footer') ?>
            </div>
        </div>
    </div>
    <?= view('template/scripts') ?>
</body>

</html>
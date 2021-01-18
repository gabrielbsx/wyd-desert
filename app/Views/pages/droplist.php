<?= $this->extend('layouts') ?>
<?= $this->section('page') ?>
<main class="content">
    <div class="news-p">
        <div class="block-title">
            <div class="title">
                <span>G</span>uia do Jogo
            </div>
        </div>
        <div class="last-more-fon" style="padding:20px;background-color:white;">
            <?php if ($droplist) : ?>
                <table style="background-color:rgba(55, 55, 55, 0.5);margin: 0 auto;text-align:center;" class="dataTable table" id="dtBasicExample">
                    <thead>
                        <tr>
                            <th style="color:white;">Mobname</th>
                            <th style="color:white;">Itemname</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($droplist as $key => $value) : ?>
                            <?php if ($value['itemname'] == 'Sem item' || $value['itemname'] == '') continue; ?>
                            <tr>
                                <td><?= $value['mobname'] ?></td>
                                <td><?= $value['itemname'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                Aguarde atualização do droplist!
            <?php endif; ?>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
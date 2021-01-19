<?= $this->extend('layouts') ?>
<?= $this->section('page') ?>
<div class="Right-side-news">
    <div class="letest-news">
        <div class="block-title">
            <div style="font-size:17pt;" class="news-title">
                Droplsit
            </div>
        </div>
        <div class="news-wrap" style="padding:20px;">
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
</div>
<?= $this->endSection() ?>
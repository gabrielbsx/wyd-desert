<?= $this->extend('admincp/layouts') ?>
<?= $this->section('page') ?>
<main class="content">
    <div class="news-p">
        <div class="block-title">
            <div class="title">
                <span>E</span>ditor de pacotes
            </div>
        </div>
        <div class="last-more-fon">
            <div id="content">
                <?php if (isset($package)) : ?>
                    <form id="login_form" class="login-form block-p" method="POST" action="<?= base_url('auth/editpackage') ?>">
                        <div class="block" style="margin:10px;text-align:center;">
                            <input type="text" name="name" value="<?= $package['name'] ?>">
                        </div>
                        <div class="block" style="margin:10px;text-align:center;">
                            <input type="number" name="value" value="<?= $package['value'] ?>">
                        </div>
                        <div class="block" style="margin:10px;text-align:center;">
                            <input type="number" name="donate" value="<?= $package['donate'] ?>">
                        </div>
                        <div class="block" style="margin:10px;text-align:center;">
                            <input type="number" name="bonus" value="<?= $package['bonus'] ?>">
                        </div>
                        <input type="hidden" name="id" value="<?= $package['id'] ?>">
                        <div class="block" style="margin:10px;text-align:center;">
                            <?php if (isset($recaptcha)) : ?>
                                <div class="text-center">
                                    <div style="margin: 0 auto;text-align:Center;" class="g-recaptcha" data-sitekey="<?= $recaptcha ?>"></div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div style="text-align:center;margin: 0 auto;" class="login-button2">
                            <button type="submit">
                                <span class="text"> Editar </span>
                            </button>
                        </div>
                    </form>
                <?php else : ?>
                    Pacote inexistente
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="news-p" style="padding:10px;">
        <div class="block-title">
            <div class="title">
                <span>E</span>ditor de Pacotes
            </div>
        </div>
        <div class="last-more-fon">
            <div id="content" style="padding:10px;">
                <?php if ($paginate_bonus) : ?>
                    <?php foreach ($paginate_bonus as $key => $value) : ?>
                        <div style="display:block;margin:10px;background-color:rgb(55, 55, 55);padding:10px;">
                            <div style="color:white;display:block;text-align:center;padding:10px;background-color:rgb(75, 75, 75);">
                                <span>
                                    <?= $value['itemname'] ?>
                                </span>
                            </div>
                            <div style="text-align:center;margin:10px 0;color:white;">
                                <span>
                                    <?= trim($value['itemid'] . ' ' . $value['effect1'] . ' ' . $value['effect_value1'] . ' ' . $value['effect2'] . ' ' . $value['effect_value2'] . ' ' . $value['effect3'] . ' ' . $value['effect_value3']) ?>
                                </span>
                            </div>
                            <div style="padding: 10px;text-align:center;margin:0 auto;">
                                <a style="background-color:rgb(55, 55, 155);padding:10px 20px;margin:10px;" href="<?= base_url('admin/edititem/' . $value['id']) ?>">
                                    Alterar item
                                </a>
                                <a style="background-color:rgb(155, 55, 55);padding:10px 20px;margin:10px;" href="<?= base_url('auth/delitem/' . $value['id']) ?>">
                                    Deletar item
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
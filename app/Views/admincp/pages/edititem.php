<?= $this->extend('admincp/layouts') ?>
<?= $this->section('page') ?>
<div class="Right-side-news">
    <div class="letest-news">
        <div class="news-title">
            Editor de itens para pacotes de doações
        </div>
        <div class="last-more-fon" style="margin: 0 auto;text-align:center;">
            <?php if (isset($bonus)) : ?>
                <form id="login_form" class="login-form block-p" method="POST" action="<?= base_url('auth/edititem') ?>">
                    <div class="input-user">
                        <label style="display:block;">Nome do item</label>
                        <input style="padding: 10px; border: 1px solid gray;" type="text" name="itemname" value="<?= $bonus['itemname'] ?>">
                    </div>
                    <div class="input-user">
                        <label style="display:block;">Id do item</label>
                        <input style="padding: 10px; border: 1px solid gray;" type="number" type="number" name="itemid" value="<?= $bonus['itemid'] ?>">
                    </div>
                    <div class="input-user">
                        <label style="display:block;">Efeito 1</label>
                        <input style="padding: 10px; border: 1px solid gray;" type="number" type="number" name="effect1" value="<?= $bonus['effect1'] ?>">
                    </div>
                    <div class="input-user">
                        <label style="display:block;">Valor de efeito 1</label>
                        <input style="padding: 10px; border: 1px solid gray;" type="number" type="number" name="effect_value1" value="<?= $bonus['effect_value1'] ?>">
                    </div>
                    <div class="input-user">
                        <label style="display:block;">Efeito 2</label>
                        <input style="padding: 10px; border: 1px solid gray;" type="number" type="number" name="effect2" value="<?= $bonus['effect2'] ?>">
                    </div>
                    <div class="input-user">
                        <label style="display:block;">Valor de efeito 2</label>
                        <input style="padding: 10px; border: 1px solid gray;" type="number" type="number" name="effect_value2" value="<?= $bonus['effect_value1'] ?>">
                    </div>
                    <div class="input-user">
                        <label style="display:block;">Efeito 3</label>
                        <input style="padding: 10px; border: 1px solid gray;" type="number" type="number" name="effect3" value="<?= $bonus['effect3'] ?>">
                    </div>
                    <div class="input-user">
                        <label style="display:block;">Valor de efeito 3</label>
                        <input style="padding: 10px; border: 1px solid gray;" type="number" type="number" name="effect_value3" value="<?= $bonus['effect_value3'] ?>">
                    </div>
                    <input type="hidden" name="id" value="<?= $bonus['id'] ?>">
                    <div class="block" style="margin:10px;text-align:center;">
                        <?php if (isset($recaptcha)) : ?>
                            <div class="text-center">
                                <div style="margin: 0 auto;text-align:Center;" class="g-recaptcha" data-sitekey="<?= $recaptcha ?>"></div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <button style="text-align:center;margin:0 auto;margin-top:10px;" type="submit">
                        Editar
                    </button>
                </form>
                <a href="<?= base_url('admin/donate') ?>">
                    <button style="text-align:center;margin:0 auto;margin-top:10px;">
                        Voltar
                    </button>
                </a>
            <?php else : ?>
                Item inexistente
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
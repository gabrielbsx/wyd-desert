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
                <form id="login_form" class="login-form block-p" method="POST" action="<?= base_url('auth/additem') ?>">
                    <div class="block" style="margin:10px;text-align:center;">
                        <input type="text" name="itemname" placeholder="Nome do item">
                    </div>
                    <div class="block" style="margin:10px;text-align:center;">
                        <input type="number" type="number" name="itemid" placeholder="Item ID">
                    </div>
                    <div class="block" style="margin:10px;text-align:center;">
                        <input type="number" type="number" name="effect1" placeholder="Efeito 1">
                    </div>
                    <div class="block" style="margin:10px;text-align:center;">
                        <input type="number" type="number" name="effect_value1" placeholder="Valor do efeito 1">
                    </div>
                    <div class="block" style="margin:10px;text-align:center;">
                        <input type="number" type="number" name="effect2" placeholder="Efeito 2">
                    </div>
                    <div class="block" style="margin:10px;text-align:center;">
                        <input type="number" type="number" name="effect_value2" placeholder="Valor do efeito 2">
                    </div>
                    <div class="block" style="margin:10px;text-align:center;">
                        <input type="number" type="number" name="effect3" placeholder="Efeito 3">
                    </div>
                    <div class="block" style="margin:10px;text-align:center;">
                        <input type="number" type="number" name="effect_value3" placeholder="Valor do efeito 3">
                    </div>
                    <input type="hidden" name="id_donate" value="<?= $id ?>">
                    <div class="block" style="margin:10px;text-align:center;">
                        <?php if (isset($recaptcha)) : ?>
                            <div class="text-center">
                                <div style="margin: 0 auto;text-align:Center;" class="g-recaptcha" data-sitekey="<?= $recaptcha ?>"></div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="clearfix"></div>
                    <div style="text-align:center;margin: 0 auto;" class="login-button2">
                        <button type="submit">
                            <span class="text"> Editar </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
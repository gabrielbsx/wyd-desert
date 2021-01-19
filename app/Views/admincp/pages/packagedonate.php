<?= $this->extend('admincp/layouts') ?>
<?= $this->section('page') ?>
<div class="Right-side-news">
    <div class="letest-news">
        <div class="block-title">
            <div class="news-title">
                <span>S</span>istema de Pacote
            </div>
        </div>
        <form method="POST" action="<?= base_url('auth/createpackage') ?>" id="loginForm">
            <div class="block" style="margin:10px;text-align:center;">
                <input style="border: 1px solid gray; padding: 10px;" id="name" type="text" name="name" placeholder="Nome" />
            </div>
            <div class="block" style="margin:10px;text-align:center;">
                <input style="border: 1px solid gray; padding: 10px;" id="title" type="text" name="value" placeholder="Valor de doação em R$" />
            </div>
            <div class="block" style="margin:10px;text-align:center;">
                <input style="border: 1px solid gray; padding: 10px;" id="donate" type="text" name="donate" placeholder="Quantidade de donate" />
            </div>
            <div class="block" style="margin:10px;text-align:center;">
                <input style="border: 1px solid gray; padding: 10px;" id="bonus" type="text" name="bonus" placeholder="Bônus em [%]" />
            </div>
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
                    <span class="text"> Criar </span>
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->extend('dashboard/layouts') ?>
<?= $this->section('page') ?>
<main class="content">
    <div class="news-p">
        <div class="block-title">
            <div class="title">
                <span>S</span>uporte
            </div>
        </div>

        <?php if (isset($ticket)) : ?>
            <div class="last-more-fon">
                <div id="content">
                    <div style="padding:10px; text-align:center;background-color: rgba(155, 155, 155, 0.2);margin:10px;color:white;border-bottom: 1px solid gray;">
                        <?= $ticket['title'] ?> | por: <?= $ticket['username'] ?>
                    </div>
                    <div class="last-more-fon" style="padding:10px; text-align:center;margin:10px;">
                        <div style="text-align:center;margin:10px;">
                            <?= $ticket['content'] ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($answers_paginate) : ?>
                <?php foreach ($answers_paginate as $key => $value) : ?>
                    <div class="last-more-fon">
                        <div id="content">
                            <div style="padding:10px; text-align:center;background-color: rgba(155, 155, 155, 0.2);margin:10px;color:white;border-bottom: 1px solid gray;">
                                <?= $value['access'] == 3 ? 'Administração' : $value['username'] ?>
                            </div>
                            <div class="last-more-fon" style="padding:10px; text-align:center;margin:10px;">
                                <div style="text-align:center;margin:10px;">
                                    <?= $value['content'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div id="content">
                    <?php if (isset($answers_pager)) : ?>
                        <?= $answers_pager->links('answers', 'pagination') ?>
                    <?php endif; ?>
                </div>
            <?php else : ?>
                <div class="last-more-fon" style="border-bottom:1px solid gray;border-top:1px solid gray;">
                    <div id="content">
                        <div style="text-align:center;margin:10px;">
                            Não há resposta
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="content-more-news">
                <div class="last-more-fon" style="margin: 0 auto;margin-top:50px;">
                    <div style="text-align:center;margin:10px;">
                        <?php if ($ticket['status'] == 0) : ?>
                            <form action="<?= base_url('auth/answerticket') ?>" method="POST">
                                <textarea name="content" class="editor"></textarea>
                                <input type="hidden" name="id_ticket" value="<?= $ticket['id'] ?>">
                                <div class="block" style="margin:10px;text-align:center;">
                                    <?php if (isset($recaptcha)) : ?>
                                        <div class="text-center">
                                            <div style="margin: 0 auto;text-align:Center;" class="g-recaptcha" data-sitekey="<?= $recaptcha ?>"></div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div style="text-align:center;margin: 0 auto;" class="login-button2">
                                    <button type="submit">
                                        <span class="text"> Response </span>
                                    </button>
                                </div>
                            </form>
                            <form class="mb-8" action="<?= base_url('auth/closeticket') ?>" method="POST">
                                <input type="hidden" name="id_ticket" value="<?= $ticket['id'] ?>">
                                <div style="text-align:center;margin: 0 auto;" class="login-button2">
                                    <button type="submit">
                                        <span class="text"> Encerrar ticket </span>
                                    </button>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                    <div style="text-align:center;margin:10px;">
                        <a href="<?= base_url('dashboard/tickets') ?>">
                            <span style="text-align:center;margin:0 auto;margin-top:20px;">
                                Voltar
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="last-more-fon">
                <div id="content">
                    <div class="last-more-top">
                        Ticket
                    </div>
                    <div class="last-more-fon" style="margin: 0 auto;">
                        <div style="text-align:center;margin:10px;">
                            Ticket inexistente
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>
<?= $this->endSection() ?>
<?php if (isset(session('web')['error'])) : ?>
    <div class="fast-links" style="text-align:center;padding:15px;background-color: rgb(155, 25, 25);color:white;margin:10px;font-size:11pt;">
        <h3 style="padding:0;margin:0;">
            <?= session('web')['error'] ?>
        </h3>
    </div>
<?php endif; ?>

<?php if (isset(session('web')['success'])) : ?>
    <div class="fast-links" style="text-align:center;padding:15px;background-color: rgb(25, 155, 25);color:white;margin:10px;font-size:11pt;">
        <h3 style="padding:0;margin:0;">
            <?= session('web')['success'] ?>
        </h3>
    </div>
<?php endif; ?>
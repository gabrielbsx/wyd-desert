<?php

/**
 * @var \CodeIgniter\Pager\PagerRenderer $pager
 */

$pager->setSurroundCount(2);

?>
<table style="width: 100%;" aria-label="<?= lang('Pager.pageNavigation') ?>">
    <tr>
        <td>
            <div id="pagination">
                <ul>
                    <li style="background: rgba(0, 0, 0, 0.7);padding:10px;">
                        <?php if ($pager->hasPrevious()) : ?>
                            <a id="next" aria-label="<?= lang('Pager.previous') ?>" href="<?= $pager->getPrevious() ?>"><<</a>
                        <?php endif; ?>
                        <?php foreach ($pager->links() as $link) : ?>
                            <a style="margin:10px;<?= $link['active'] ? 'color:rgb(255,255,255);' : 'color:rgb(155,155,155);' ?>" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
                        <?php endforeach; ?>
                        <?php if ($pager->hasNext()) : ?>
                            <a id="next" aria-label="<?= lang('Pager.next') ?>" href="<?= $pager->getNext() ?>">>></a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </td>
    </tr>
</table>
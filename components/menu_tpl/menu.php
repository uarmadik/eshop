<li <?= (isset($category['childs'])) ? 'class="sub-menu"' : '' ?>>

    <?php if (isset($category['childs'])): ?>
        <span><?= $category['name'] ?></span>
        <span class="menu_arrow"></span>
    <?php else: ?>
        <a href="/<?= $category['url'] ?>"><?= $category['name'] ?></a>
    <?php endif; ?>


    <?php if( isset($category['childs']) ): ?>
        <ul>
            <?= $this->getMenuHtml($category['childs'])?>
        </ul>
    <?php endif;?>
</li>
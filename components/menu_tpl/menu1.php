
<!--<li --><?//= (isset($category['childs'])) ? 'style="border-bottom: 1px solid red"' : '' ?><!-->-->
<!--    <a href="#">-->
<!--        --><?//= $category['name']?>
<!--        --><?php //if( isset($category['childs']) ): ?>
<!--<!--            <span class="badge pull-right"><i class="fa fa-plus"></i></span>-->-->
<!--        --><?php //endif;?>
<!--    </a>-->
<!--    --><?php //if( isset($category['childs']) ): ?>
<!--        <ul>-->
<!--            --><?//= $this->getMenuHtml($category['childs'])?>
<!--        </ul>-->
<!--    --><?php //endif;?>
<!--</li>-->



<li <?= (isset($category['childs'])) ? 'class="sub-menu"' : '' ?>>

    <?php if (isset($category['childs'])): ?>
        <?= $category['name'] ?>
        <span> >> </span>
    <?php else: ?>
        <a href="/main/<?= $category['url'] ?>"><?= $category['name'] ?></a>
    <?php endif; ?>


    <?php if( isset($category['childs']) ): ?>
        <ul>
            <?= $this->getMenuHtml($category['childs'])?>
        </ul>
    <?php endif;?>
</li>
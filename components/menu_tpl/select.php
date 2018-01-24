
<option
    value="<?= $category['id']?>"
    <?php
        if (isset($this->model->parent_id)) {
            echo ($this->model->parent_id == $category['id']) ? 'selected' : '';
        } elseif (isset($this->model->category_id)) {
            echo ($this->model->category_id == $category['id']) ? 'selected' : '';
        }
    ?>  >
    <?= $tab . $category['name']?>
<?php if( isset($category['childs']) ): ?>
    <ul>
        <?= $this->getMenuHtml($category['childs'], $tab . ' - ')?>
    </ul>
<?php endif;?>
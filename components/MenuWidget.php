<?php

namespace app\components;

use app\models\Category;
use yii\base\Exception;
use yii\base\Widget;

class MenuWidget extends Widget
{
    public $data;
    public $tree;
    public $menuHtml;
    public $tpl;

    public function init() {

        parent::init();

        if (!in_array($this->tpl, ['menu', 'select', 'select_product'])) {
            $this->tpl = 'menu' . '.php';
        } else {
            $this->tpl .= '.php';
        }

    }

    public function run()
    {
        $this->data = Category::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);

        return $this->menuHtml;

    }

    protected function getTree()
    {
        $tree = [];
        foreach ($this->data as $id=>&$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }

    protected function getMenuHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category, $tab);
        }
        return $str;
    }

    protected function catToTemplate($category, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }
}
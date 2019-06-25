<?php
namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Url;
use app\widgets\ActiveChecker;

class SideMenu extends Widget {
    public $menu;

    public function init() {
        parent::init();
        if ($this->menu === null) {
            $this->menu = [];
        }
    }

    public function run() {
        return $this->render('@app/views/sidemenu/sidemenu', array('menu' => array_filter(array_map([$this, 'applyFilters'], $this->menu))));
    }

    protected function applyFilters($item) {
        if (is_string($item)) {
            return $item;
        }

        if (!isset($item['header'])) {
            // Determine active link in the side menu
            $checker = new ActiveChecker();
            // $item['active'] = $checker->isActive($item);

            // Generate Href
            $item['href'] = $this->makeHref($item);
        } else {
            $item = $item['header'];
        }

        // Resolve submenus
        if (isset($item['submenu'])) {
            $item['submenu'] = array_filter(array_map([$this, 'applyFilters'], $item['submenu']));
            $item['submenu_open'] = isset($item['active']) ? $item['active'] : false;
        }

        return $item;
    }

    protected function makeHref($item) {
        if (isset($item['url'])) {
            return Url::to([$item['url']]);
        }

        return '#';
    }
}
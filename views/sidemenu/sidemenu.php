<?php if (isset($menu)) { ?>
    <?php foreach ($menu as $menuItem) { ?>
        <?php if (is_string($menuItem)) { ?>
            <li class="nav-title"><?= $menuItem ?></li>
        <?php } else { ?>
            <li class="<?= isset($menuItem['item_class']) ? $menuItem['item_class'] : 'nav-item' ?> <?= isset($menuItem['submenu']) ? 'nav-dropdown' : '' ?> <?= isset($menuItem['active']) ? 'active' : '' ?>">
                <a class="nav-link<?= isset($menuItem['submenu']) ? ' nav-dropdown-toggle' : '' ?><?= isset($menuItem['active']) ? ' active' : '' ?>" href="<?= isset($menuItem['href']) ? $menuItem['href'] : '#' ?>"
                <?= isset($menuItem['target']) ? 'target="'.$menuItem['target'].'"' : '' ?>
                >
                    <i class="nav-icon cui-<?= isset($menuItem['icon']) ? $menuItem['icon'] : 'chevron-right' ?> <?= isset($menuItem['icon_color']) ? 'text-'.$menuItem['icon_color'] : '' ?>"></i> <?= isset($menuItem['text']) ? $menuItem['text'] : '' ?>
                    <?php if (isset($menuItem['label'])) { ?>
                        <span class="badge badge-<?= isset($menuItem['label_color']) ? $menuItem['label_color'] : 'primary' ?>"><?= $menuItem['label'] ?></span>
                    <?php } //endif ?>
                </a>
                <?php if (isset($menuItem['submenu'])) { ?>
                    <ul class="nav-dropdown-items">
                        <?= $this->render('@app/views/sidemenu/sidemenu', array('menu' => $menuItem['submenu'])) ?>
                    </ul>
                <?php } //endif ?>
            </li>
        <?php } // endif ?>
    <?php } // endforeach ?>
<?php } // endif ?>
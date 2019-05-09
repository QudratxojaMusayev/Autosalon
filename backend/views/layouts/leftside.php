<?php

use adminlte\widgets\Menu;
use common\models\User;
use yii\helpers\Html;

$user = User::findOne(Yii::$app->user->id);
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?= Html::img('@web/img/user2-160x160.jpg', ['class' => 'img-circle', 'alt' => 'User Image']) ?>
            </div>
            <div class="pull-left info">
                <p>
                    <?php if ($user != null) : ?>
                        <?= $user->username; ?>
                    <?php endif; ?>
                </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?=
        Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    [
                        'label' => 'Menu',
                        'options' => ['class' => 'header']
                    ],
                    [
                        'label' => Yii::t('yii', 'Automobiles'),
                        'icon' => 'fa fa-car',
                        'url' => ['automobile/index'],
                        'active' => $this->context->route == 'site/index'
                    ],
                    [
                        'label' => Yii::t('yii', 'Markas'),
                        'icon' => 'fa fa-trademark',
                        'url' => ['marka/index'],
                    ],
                    [
                        'label' => Yii::t('yii', 'Positions'),
                        'icon' => 'fa fa-cogs',
                        'url' => ['position/index'],
                    ],
                    [
                        'label' => Yii::t('yii', 'Colors'),
                        'icon' => 'fa fa-paint-brush',
                        'url' => ['color/index'],
                    ],
                    [
                        'label' => 'Users',
                        'icon' => 'fa fa-users',
                        'url' => ['/user'],
                        'active' => $this->context->route == 'user/index',
                    ],
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                ],
            ]
        )
        ?>

    </section>
    <!-- /.sidebar -->
</aside>

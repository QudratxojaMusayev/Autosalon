<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;

$user = User::findOne(Yii::$app->user->id);
?>
<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b><?= $title ?></b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b><?= Yii::t('yii', $title) ?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=Yii::t('yii', 'Languages') ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?= Url::to('/site/language', ['lang' => 'uz']); ?>">O'zbekcha</a></li>
                        <li><a href="<?= Url::to('/site/language', ['lang' => 'en']); ?>">English</a></li>
                       </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?= Html::img('@web/img/user2-160x160.jpg', ['class' => 'user-image', 'alt' => 'User Image']) ?>
                        <span class="hidden-xs">
                            <?php if ($user != null) : ?>
                            <?= $user->username; ?>
                            <?php endif; ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <?= Html::img('@web/img/user2-160x160.jpg', ['class' => 'img-circle', 'alt' => 'User Image']) ?>
                            <p>
                                <?php if ($user != null) : ?>
                                <?= $user->username; ?>
                                <small>
                                    <?=Yii::t('yii', 'Member since'). ' : '. date('d/m/y', $user->created_at); ?>
                                </small>
                                <?php endif; ?>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat"><?=Yii::t('yii', 'Profile') ?></a>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(

                                    Yii::t('yii', 'Sign Out'),

                                    ['/site/logout'],

                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']

                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>

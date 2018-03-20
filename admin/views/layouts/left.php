<aside class="main-sidebar " >

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <? if ($userIdentity) :  ?>
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $userIdentity->profile->getAvatarUrl(150)   ?>" class="img-circle" alt="User
                Image"/>
            </div>
            <div class="pull-left info">
                <p><?= $userIdentity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <? endif; ?>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [

                    #ДЛЯ менеджера
                    ['label' => 'Работа со складом', 'options' => ['class' => 'header'],'visible' =>
                        Yii::$app->user->can('admin')],

                    ['label' => 'Категории товаров', 'icon' => 'th-list', 'url' => ['/admin/categories/index'],'visible' =>
                        Yii::$app->user->can('admin')],
                    ['label' => 'Уаправление складом', 'icon' => 'archive', 'url' => ['/admin/store/index'],'visible' =>
                            Yii::$app->user->can('admin')],

                    #Товары
                    ['label' => 'Работа с сайтом', 'options' => ['class' => 'header']],

                    ['label' => 'Управление баннерами', 'icon' => 'image', 'url' => ['/admin/partners/index'],'visible' =>
                        Yii::$app->user->can('admin')],
                    ['label' => Yii::t('app','Managing slides'), 'icon' => 'camera-retro', 'url' => ['/admin/slider/index'],'visible' =>
                        Yii::$app->user->can('admin')],
                    ['label' => 'Управление пользователями', 'icon' => 'users', 'url' => ['/user/admin'],'visible' =>
                        Yii::$app->user->can('admin')],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Sign in', 'url' => ['/user/security/login']] :
                        ['label' => 'Sign out (' . Yii::$app->user->identity->username . ')',
                         'url' => ['/user/security/logout'],
                         'linkOptions' => ['data-method' => 'post']],
                    ['label' => 'Register', 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest]

                ],
            ]
        ) ?>

    </section>

</aside>

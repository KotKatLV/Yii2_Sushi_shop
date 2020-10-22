<?php
/* @var $this View
 *
 * @var $content string
 */

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

AppAsset::register($this);
?>
<?php
$this->title = 'PHP-SHOP';
$this->beginPage()
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    $this->registerCsrfMetaTags()
    ?>
    <title>
        <?= Html::encode($this->title) ?>
    </title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<section class="body">
    <header>
        <div class="container">
            <div class="header">
                <a href="/">На главную</a>
                <? if (!Yii::$app->user->isGuest) { ?>
                    <a href="/admin">Панель администрирования</a>
                <? } ?>

                <? if (Yii::$app->user->isGuest) { ?>
                    <a href="/admin/login">Вход в админку</a>
                <? } else { ?>
                    <a href="/admin/logout">Выход из админки</a><?
                } ?>
                   <a class="cart" href="#" onclick="openCart(event)">Корзина <span class='menu-quantity'>(<?= $_SESSION['cart.totalQuantity'] ? $_SESSION['cart.totalQuantity'] : 0 ?>)</span></a>
                <form method="get" action="<?= Url::to(['category/search']) ?>">
                    <input type="text" style="padding: 5px" placeholder="Поиск..." name="search">
                </form>

            </div>
        </div>
    </header>
    <div class="container"><?= $content ?></div>
    <footer>
        <div class="container">
            <div class="footer"> &copy; Все права защищены или типа того</div>
        </div>
    </footer>
</section>
<div id="cart" class="modal fade bg-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <? if ($_SESSION['cart']) { ?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Фото</th>
                        <th scope="col">Наименование</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Цена</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <? foreach ($_SESSION['cart'] as $id => $good) { ?>
                        <tr>
                            <td style="vertical-align: middle" width="150"><img src="/img/<?= $good['img'] ?>"
                                                                                alt="<?= $good['name'] ?>"></td>
                            <td style="vertical-align: middle"><?= $good['name'] ?></td>
                            <td style="vertical-align: middle"><?= $good['goodQuantity'] ?></td>
                            <td style="vertical-align: middle"><?= $good['price'] * $good['goodQuantity'] ?> рублей</td>
                            <td  data-id="<?= $id ?>" class="delete" style="text-align: center; cursor: pointer; vertical-align: middle; color: red">
                                <span >✖</span></td>
                        </tr>
                    <? } ?>
                    <tr style="border-top: 4px solid black">
                        <td colspan="4">Всего товаров</td>
                        <td class="total-quantity"><?= $_SESSION['cart.totalQuantity'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="4">На сумму </td>
                        <td style="font-weight: 700"><?= $_SESSION['cart.totalSum'] ?> рублей</td>
                    </tr>
                    </tbody>
                </table>
                <div class="modal-buttons" style="display: flex; padding: 15px; justify-content: space-around">
                    <button type="button" class="btn btn-danger" onclick="clearCart(event)">Очистить корзину</button>
                    <button type="button" class="btn btn-secondary btn-close">Продолжить покупки</button>
                    <button type="button" class="btn btn-success btn-next">Оформить заказ</button>
                </div>
            <? } else { ?>
                <h3>В вашей корзине ничего нет:(</h3>
                <button type="button" class="btn btn-secondary btn-close">Продолжить покупки</button>
            <? } ?>
        </div>
    </div>
</div>
<div id="order" class="modal fade bg-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content"> ...</div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
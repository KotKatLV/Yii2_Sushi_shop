<?php


namespace app\controllers;

use yii\web\Controller;
use app\models\Good;

class CategoryController extends Controller
{
    public function actionIndex()
    {
        $goods = new Good();
        $goods = $goods->getAllGoods();
        return $this->render('index', compact('goods'));
    }
    public function actionView($id)
    {
        $catGoods = new Good();
        $catGoods = $catGoods->getGoodsCategories($id);
        return $this->render('view', compact('catGoods'));
    }
    public function actionSearch()
    {
        $search = \Yii::$app->request->get('search');
        $goods = new Good();
        $goods = $goods->getSearchResults($search);
        return $this->render('search', compact('goods', 'search'));
    }
}
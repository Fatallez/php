<?php

namespace App\controllers;

use App\entities\Good;
use App\repositories\GoodRepository;

class BasketController extends Controller
{
    protected $defaultAction = 'my';

    public function addAction()
    {
        $request = $this->app->request;
        /** @var GoodRepository $repository */
        $repository = $this->getRepository('good');

        $hasAdd = $this->app->basketServices->add($request, $repository);

        if (!$hasAdd) {
            return $this->render(404);
        }

        $request->redirectApp('Информация обновлена');

        return '';
    }

    public function delAction()
    {
        $request = $this->app->request;
        /** @var GoodRepository $repository */

        $this->app->basketServices->delete($request);
        $request->redirectApp();

        return '';
    }

    public function myAction()
    {
        $request = $this->app->request;
        $goods = $request->getSession('goods');

        return $this->render(
            'basket',
            [
                'goods' => $goods,
                'menu' => $this->getMenu(),
                'totalPrice' => $this->countTotalPrice(),
            ]
        );
    }

    public function countTotalPrice()
    {
        $request = $this->app->request;
        $goods = $request->getSession('goods');
        $totalPrice = 0;

        foreach ($goods as $good) {
            $totalPrice += $good['price'] * $good['count'];
        }

        return $totalPrice;
    }
}
<?php

namespace App\Http\View\Composers;

use App\Model\Admin\Category;
use App\Model\Admin\Config;
use App\Model\Admin\Course;
use App\Model\Admin\Gallery;
use App\Model\Admin\Manufacturer;
use App\Model\Admin\PostCategory;
use App\Model\Admin\Product;
use App\Model\Admin\Room;
use App\Model\Admin\Service;
use App\Model\Admin\Solution;
use App\Model\Admin\Store;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HeaderComposer
{
    /**
     * Compose Settings Menu
     * @param View $view
     */
    public function compose(View $view)
    {
        $config = Config::query()->get()->first();
        $categories = Category::query()->with(['childs'])
            ->where('parent_id', 0)
            ->orderBy('sort_order')->get();

        $cartItems = \Cart::getContent();
        $totalPriceCart = \Cart::getTotal();

        $manufactures = Manufacturer::query()->get();

        $viewedIds = session('viewed_products', []);
        $viewedProducts = [];
        if ($viewedIds) {
            $viewedProducts = Product::query()->with(['image'])
                ->whereIn('id', $viewedIds)
                ->orderByRaw(\DB::raw("FIELD(id,".implode(',', $viewedIds).")"))
                ->get();
        }

        $view->with(['config' => $config,
            'categories' => $categories,
            'cartItems' => $cartItems,
            'totalPriceCart' => $totalPriceCart,
            'manufactures' => $manufactures,
            'viewedProducts' => $viewedProducts,
        ]);
    }
}

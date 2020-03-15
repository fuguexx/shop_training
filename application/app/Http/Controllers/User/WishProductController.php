<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\WishList;
use Illuminate\Http\Request;

class WishProductController extends Controller
{
    public function store(Request $request)
    {
        $userId = $request->get('userId');
        $productId = $request->get('productId');
        
        WishList::create([
            'user_id' => $userId,
            'product_id' => $productId,
        ]);
    }

    public function delete(Request $request)
    {
        $userId = $request->get('userId');
        $productId = $request->get('productId');

        $query = WishList::query();
        $query->where('user_id', '=', $userId)->where('product_id', '=', $productId)->delete();
    }
}

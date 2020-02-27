<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

/**
 * Class LayoutComposer
 * @package App\Http\ViewComposers
 */
class LayoutComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with([
            'loginUser' => Auth::user(),
        ]);
    }

}
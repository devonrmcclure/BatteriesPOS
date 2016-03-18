<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Users\Repository as UserRepository;

class DateComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('date', date('l, F j, Y'));
    }
}
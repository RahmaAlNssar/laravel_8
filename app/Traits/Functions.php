<?php
namespace App\Traits;

trait Functions {
public function getModel()
{
    if (request()->segment(1) === 'dashboard' && !empty(request()->segment(2)))
        return request()->segment(2);

    if (request()->segment(2) === 'dashboard' && !empty(request()->segment(3)))
        return request()->segment(3);

    return 'dashboard';
} // end of active function
}
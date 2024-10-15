<?php
namespace App\Services;
use App\Interfaces\IViewService;

class ViewIp implements IViewService
{
    public function getViews($request = null): int
    {
        return 10;
    }
}

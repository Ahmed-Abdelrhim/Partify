<?php
namespace App\Interfaces;

interface IViewService
{
    public function getViews($request = null): int;
}

<?php

namespace App\Models\traits;
use Illuminate\Support\Facades\Redis;

trait LogView
{
    public function logView()
    {
        Redis::pfadd(sprintf('%s:%u:views', $this->getTable(), $this->id), [request()->ip()]);
    }

    public function getViewCount()
    {
        return Redis::pfcount(sprintf('%s:%u:views', $this->getTable(), $this->id));
    }
}


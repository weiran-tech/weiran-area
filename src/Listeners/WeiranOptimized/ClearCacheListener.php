<?php

declare(strict_types = 1);

namespace Weiran\Area\Listeners\WeiranOptimized;

use Weiran\Framework\Events\WeiranOptimized;

/**
 * 清除缓存
 */
class ClearCacheListener
{

    /**
     * @param WeiranOptimized $event 框架优化
     */
    public function handle(WeiranOptimized $event)
    {
        sys_tag('weiran-area')->clear();
    }
}


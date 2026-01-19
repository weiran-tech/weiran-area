<?php

declare(strict_types = 1);

namespace Weiran\Area\Listeners\WeiranOptimized;

use Weiran\Framework\Events\WeiranOptimizedEvent;

/**
 * 清除缓存
 */
class ClearCacheListener
{
    /**
     * @param WeiranOptimizedEvent $event 框架优化
     */
    public function handle(WeiranOptimizedEvent $event)
    {
        sys_tag('weiran-area')->clear();
    }
}

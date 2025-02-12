<?php

declare(strict_types = 1);

namespace Weiran\Area\Listeners\PoppyOptimized;

use Weiran\Framework\Events\PoppyOptimized;

/**
 * 清除缓存
 */
class ClearCacheListener
{

    /**
     * @param PoppyOptimized $event 框架优化
     */
    public function handle(PoppyOptimized $event)
    {
        sys_tag('weiran-area')->clear();
    }
}


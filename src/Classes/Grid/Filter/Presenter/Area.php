<?php

declare(strict_types = 1);

namespace Weiran\Area\Classes\Grid\Filter\Presenter;

use Weiran\Area\Models\SysArea;
use Weiran\MgrPage\Classes\Grid\Filter\Presenter\Presenter;

class Area extends Presenter
{
    public function view(): string
    {
        return 'weiran-area::tpl.filter.area';
    }

    public function variables(): array
    {
        return [
            'area' => SysArea::cityTree(),
        ];
    }
}

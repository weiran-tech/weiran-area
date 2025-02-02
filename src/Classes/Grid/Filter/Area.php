<?php

declare(strict_types = 1);

namespace Weiran\Area\Classes\Grid\Filter;

use Weiran\MgrPage\Classes\Grid\Filter\FilterItem;

class Area extends FilterItem
{

    public function render()
    {
        $this->presenter = new Presenter\Area();
        return parent::render();
    }

}

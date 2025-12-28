<?php

declare(strict_types = 1);

namespace Weiran\Area\Classes\Form\Field;

use Weiran\Area\Models\SysArea;
use Weiran\MgrPage\Classes\Form\Field;

final class Area extends Field
{
    /**
     * {@inheritDoc}
     */
    protected string $view = 'weiran-area::tpl.form.area';

    public function render()
    {
        $this->addVariables([
            'area' => SysArea::cityTree(),
        ]);

        return parent::render();
    }
}

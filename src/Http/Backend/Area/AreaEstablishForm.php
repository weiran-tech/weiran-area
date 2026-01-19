<?php

declare(strict_types = 1);

namespace Weiran\Area\Http\Backend\Area;

use Weiran\Area\Action\Area;
use Weiran\Area\Models\SysArea;
use Weiran\Framework\Classes\Resp;
use Weiran\Framework\Classes\Traits\AppTrait;
use Weiran\Framework\Exceptions\ApplicationException;
use Weiran\Framework\Validation\Rule;
use Weiran\MgrPage\Classes\Widgets\FormWidget;
use Weiran\System\Classes\Traits\PamTrait;

class AreaEstablishForm extends FormWidget
{
    use AppTrait, PamTrait;

    public bool $ajax = true;

    private $id;

    /**
     * @var SysArea
     */
    private $item;

    /**
     * 设置id
     *
     * @return $this
     */
    public function setId($id): self
    {
        $this->id = $id;

        if ($id) {
            $this->item = SysArea::find($this->id);
            if (!$this->item) {
                throw new ApplicationException('无地区信息');
            }
        }

        return $this;
    }

    public function handle()
    {
        $id   = (int) input('id');
        $area = (new Area())->setPam($this->pam);
        if (is_post()) {
            if ($area->establish(input(), $id)) {
                return Resp::success('添加版本成功', '_top_reload|1');
            }

            return Resp::error($area->getError());
        }

        $id && $area->initArea($id) && $area->share();

    }

    public function data(): array
    {
        if ($this->item) {
            return [
                'id'    => $this->item->id,
                'title' => $this->item->title,
            ];
        }

        return [];
    }

    public function form()
    {
        if ($this->id) {
            $this->hidden('id', 'ID');
        }
        $this->text('title', '地区名称')->rules([
            Rule::nullable(),
        ]);
        $this->area('parent_id', '选择省级')->rules([
            Rule::nullable(),
        ]);
    }
}

<?php

declare(strict_types = 1);

namespace Weiran\Area\Http\MgrPage;

use Closure;
use Weiran\Area\Models\SysArea;
use Weiran\Framework\Exceptions\ApplicationException;
use Weiran\MgrPage\Classes\Grid\Column;
use Weiran\MgrPage\Classes\Grid\Displayer\Actions;
use Weiran\MgrPage\Classes\Grid\Filter;
use Weiran\MgrPage\Classes\Grid\ListBase;
use Weiran\MgrPage\Classes\Operations;

class ListSysArea extends ListBase
{

    public string $title = '地区管理';

    /**
     * @throws ApplicationException
     */
    public function columns()
    {
        $this->column('id', 'ID')->sortable()->width(80);
        $this->column('title', '名称');
        $this->addColumn(Column::NAME_ACTION, '操作')->displayUsing(Actions::class, [function (Actions $actions) {
            /** @var SysArea $item */
            $item = $actions->row;
            $actions->edit(route('py-area:backend.content.establish', [$item->id]));
            $actions->delete(route('py-area:backend.content.delete', [$item->id]), $item->title);
        },])->width(140)->fixed();
    }


    public function filter(): Closure
    {
        return function (Filter $filter) {
            $filter->column(1, function (Filter $column) {
                $column->like('title', '标题');
            });
            $filter->column(2, function (Filter $column) {
                $column->area('parent_id', '上级地区');
            });
        };
    }

    public function quickButtons(): Closure
    {
        return function (Operations $operations) {
            $operations->create(route_url('py-area:backend.content.establish'));
            $operations->progress(route_url('py-area:backend.content.fix'));
        };
    }
}

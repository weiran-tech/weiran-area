<?php

declare(strict_types = 1);

namespace Weiran\Area\Http\Backend;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Throwable;
use Weiran\Area\Action\Area;
use Weiran\Area\Http\Backend\Area\AreaEstablishForm;
use Weiran\Area\Http\Backend\Area\AreaList;
use Weiran\Area\Models\SysArea;
use Weiran\Framework\Classes\Resp;
use Weiran\Framework\Exceptions\ApplicationException;
use Weiran\MgrPage\Classes\Grid;
use Weiran\MgrPage\Http\Backend\BackendController;

/**
 * 地区管理控制器
 */
class AreaController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
        self::$permission = [
            'global' => 'backend:weiran-area.main.manage',
        ];
    }

    /**
     * 地区列表
     *
     * @return \Illuminate\Http\Response|JsonResponse|RedirectResponse|string
     *
     * @throws ApplicationException
     * @throws Throwable
     */
    public function index()
    {
        $grid = new Grid(new SysArea());
        $grid->setLists(AreaList::class);

        return $grid->render();
    }

    /**
     * 地区添加/编辑
     *
     * @param null|int $id 地区id
     */
    public function establish($id = null)
    {
        $form = new AreaEstablishForm();
        $form->setPam($this->pam);
        $form->setId($id);

        return $form->render();
    }

    /**
     * 删除地区
     *
     * @param int $id 地区id
     *
     * @throws Exception
     */
    public function delete($id)
    {
        $Area = $this->action();
        if ($Area->delete((int) $id)) {
            return Resp::success('删除成功', '_reload|1');
        }

        return Resp::error($Area->getError());
    }

    /**
     * 更新
     */
    public function fix()
    {
        return (new Area())->fixHandle();
    }

    /**
     * 版本Action
     */
    private function action(): Area
    {
        return (new Area())->setPam($this->pam);
    }
}

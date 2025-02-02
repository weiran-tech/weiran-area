<?php

declare(strict_types = 1);

namespace Weiran\Area\Http\Request\ApiV1\Web;

use Weiran\Area\Models\SysArea;
use Weiran\Framework\Classes\Resp;
use Weiran\Framework\Helper\UtilHelper;
use Weiran\System\Http\Request\ApiV1\WebApiController;

/**
 * 地区管理控制器
 */
class AreaController extends WebApiController
{

    /**
     * @api                   {post} api_v1/area/area/code [Area]地区代码
     * @apiDescription        获取地区代码
     * @apiVersion            1.0.0
     * @apiName               AreaAreaCode
     * @apiGroup              Poppy
     * @apiSuccess {object[]} data         返回
     * @apiSuccess {integer}  id           ID
     * @apiSuccess {string}   title        标题
     * @apiSuccess {string}   code         地区编码
     * @apiSuccess {object[]} children     子级别
     * @apiSuccessExample     {json} data:
     * {
     *     "status": 0,
     *     "message": "",
     *     "data": [
     *         {
     *             "id": 1,
     *             "title": "北京市",
     *             "children": [
     *                 {
     *                     "id": 3,
     *                     "title": "北京市",
     *                     "children": [
     *                         {
     *                             "id": 4,
     *                             "title": "东城区"
     *                         }
     *                     ]
     *                 }
     *             ]
     *         }
     *     ]
     * }
     */
    public function code()
    {
        $items = SysArea::selectRaw('id,title,left(code, 6) as code,parent_id')->get()->toArray();
        $array = UtilHelper::genTree($items, 'id', 'parent_id', 'children', false);
        return Resp::success('获取数据成功', $array);
    }


    /**
     * @api                   {post} api_v1/area/area/country [Area]国别
     * @apiDescription        获取国家代码
     * @apiVersion            1.0.0
     * @apiName               AreaAreaCountry
     * @apiGroup              Poppy
     */
    public function country()
    {
        return Resp::success(
            '获取成功',
            SysArea::country()
        );
    }
}
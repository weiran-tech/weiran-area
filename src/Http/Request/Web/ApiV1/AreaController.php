<?php

declare(strict_types = 1);

namespace Weiran\Area\Http\Request\Web\ApiV1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use OpenApi\Attributes as OA;
use Weiran\Area\Models\SysArea;
use Weiran\Framework\Classes\Resp;
use Weiran\Framework\Helper\UtilHelper;
use Weiran\System\Http\Request\Web\ApiV1\WebApiController;

/**
 * Area
 */
class AreaController extends WebApiController
{

    #[OA\Get(
        path: 'api/web/v1/area/area/code',
        summary: '地区代码',
        tags: ['Area'],
        responses: [
            new OA\Response(
                response: 200,
                description: '获取成功',
                content: new OA\JsonContent(ref: '#/components/schemas/AreaAreaCodeBody',)
            )
        ]
    )]
    public function code(): Response|JsonResponse|RedirectResponse
    {
        $items = SysArea::selectRaw('id,title,left(code, 6) as code,parent_id')->get()->toArray();
        $array = UtilHelper::genTree($items, 'id', 'parent_id', 'children', false);
        return Resp::success('获取数据成功', $array);
    }


    #[OA\Get(
        path: 'api/web/v1/area/area/country',
        summary: '国别',
        tags: ['Area'],
        responses: [
            new OA\Response(
                response: 200,
                description: '获取成功',
                content: new OA\JsonContent(ref: '#/components/schemas/AreaAreaCountryBody')
            )
        ]
    )]
    public function country(): Response|JsonResponse|RedirectResponse
    {
        return Resp::success(
            '获取成功',
            SysArea::country()
        );
    }
}
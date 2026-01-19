<?php

namespace Weiran\Area\Http\Web\ApiV1\Area;

use OpenApi\Attributes as OA;

#[OA\Schema(
    description: '地区码',
)]
class AreaCodeItem
{
    #[OA\Property(
        description: '地区信息',
        properties: [
            new OA\Property(property: 'id', description: 'ID', type: 'integer'),
            new OA\Property(property: 'title', description: '用户名', type: 'string'),
            new OA\Property(property: 'children', description: '子级别', type: 'array', items: new OA\Items(
                properties: [
                    new OA\Property(property: 'id', description: 'ID', type: 'integer'),
                    new OA\Property(property: 'title', description: '用户名', type: 'string'),
                    new OA\Property(property: 'children', description: '子级别', type: 'array', items: new OA\Items(
                        properties: [
                            new OA\Property(property: 'id', description: 'ID', type: 'integer'),
                            new OA\Property(property: 'title', description: '用户名', type: 'string'),
                        ]
                    )),
                ]
            )),
        ],
        type: 'object'
    )]
    public object $data;
}

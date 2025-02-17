<?php

namespace Weiran\Area\Http\Request\Web\OA;

use OpenApi\Attributes as OAT;

#[OAT\Schema(
    description: '地区码',
)]
class AreaAreaCodeItem
{
    #[OAT\Property(
        description: '地区信息',
        properties: [
            new OAT\Property(property: 'id', description: 'ID', type: 'integer'),
            new OAT\Property(property: 'title', description: '用户名', type: 'string'),
            new OAT\Property(property: 'children', description: '子级别', type: 'array', items: new OAT\Items(
                properties: [
                    new OAT\Property(property: 'id', description: 'ID', type: 'integer'),
                    new OAT\Property(property: 'title', description: '用户名', type: 'string'),
                    new OAT\Property(property: 'children', description: '子级别', type: 'array', items: new OAT\Items(
                        properties: [
                            new OAT\Property(property: 'id', description: 'ID', type: 'integer'),
                            new OAT\Property(property: 'title', description: '用户名', type: 'string'),
                        ]
                    ))
                ]
            )),
        ],
        type: 'object'
    )]
    public object $data;
}
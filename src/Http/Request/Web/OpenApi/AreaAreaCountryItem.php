<?php

namespace Weiran\Area\Http\Request\Web\OpenApi;

use OpenApi\Attributes as OA;

#[OA\Schema(
    description: '国别码',
    properties: [
        new OA\Property(property: 'en', description: '英文', type: 'string'),
        new OA\Property(property: 'iso', description: '国标', type: 'string'),
        new OA\Property(property: 'py', description: '拼音', type: 'string'),
        new OA\Property(property: 'zh', description: '中文', type: 'string'),
        new OA\Property(property: 'cty', description: '国别码', type: 'int'),
    ],
    type: 'object'
)]
class AreaAreaCountryItem
{
}
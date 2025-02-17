<?php

namespace Weiran\Area\Http\Request\Web\OA;

use OpenApi\Attributes as OAT;

#[OAT\Schema(
    description: '国别码',
    properties: [
        new OAT\Property(property: 'en', description: '英文', type: 'string'),
        new OAT\Property(property: 'iso', description: '国标', type: 'string'),
        new OAT\Property(property: 'py', description: '拼音', type: 'string'),
        new OAT\Property(property: 'zh', description: '中文', type: 'string'),
        new OAT\Property(property: 'cty', description: '国别码', type: 'int'),
    ],
    type: 'object'
)]
class AreaAreaCountryItem
{
}
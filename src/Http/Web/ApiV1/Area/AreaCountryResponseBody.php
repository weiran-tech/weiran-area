<?php

namespace Weiran\Area\Http\Web\ApiV1\Area;

use OpenApi\Attributes as OA;
use Weiran\System\Http\OpenApi\BaseResponseBody;

#[OA\Schema(
    description: '国别码',
)]
class AreaCountryResponseBody extends BaseResponseBody
{
    #[OA\Property(
        type: 'array',
        items: new OA\Items(ref: AreaCountryItem::class)
    )]
    public array $data;
}

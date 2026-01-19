<?php

declare(strict_types = 1);

namespace Weiran\Area\Http\Web\ApiV1\Area;

use OpenApi\Attributes as OA;
use Weiran\System\Http\OpenApi\BaseResponseBody;

#[OA\Schema(
    description: '地区码',
)]
class AreaCodeResponseBody extends BaseResponseBody
{
    #[OA\Property(
        type: 'array',
        items: new OA\Items(ref: AreaCountryItem::class)
    )]
    public array $data;
}

<?php

namespace Weiran\Area\Http\Request\Web\OpenApi;

use OpenApi\Attributes as OA;
use Weiran\System\Http\Request\Web\OpenApi\ResponseBaseBody;

#[OA\Schema(
    description: '国别码',
)]
class AreaAreaCountryBody extends ResponseBaseBody
{
    #[OA\Property(
        type: 'array',
        items: new OA\Items(ref: AreaAreaCountryItem::class)
    )]
    public array $data;
}
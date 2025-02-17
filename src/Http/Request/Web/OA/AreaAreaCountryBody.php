<?php

namespace Weiran\Area\Http\Request\Web\OA;

use OpenApi\Attributes as OA;
use Weiran\System\Http\Request\Web\OA\ResponseBaseBody;

#[OA\Schema(
    description: '国别码',
)]
class AreaAreaCountryBody extends ResponseBaseBody
{
    #[OA\Property(
        type: 'array',
        items: new OA\Items(ref: '#/components/schemas/AreaAreaCountryItem')
    )]
    public array $data;
}
<?php

declare(strict_types = 1);

namespace Weiran\Area\Models\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Weiran\Area\Models\SysArea;

/**
 * 地区resource
 *
 * @mixin SysArea
 */
class AreaContentResource extends JsonResource
{
    /**
     * {@inheritDoc}
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'title'     => $this->title,
            'parent_id' => $this->parent_id,
        ];
    }
}

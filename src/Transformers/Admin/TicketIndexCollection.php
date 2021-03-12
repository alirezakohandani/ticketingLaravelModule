<?php

namespace Kohandani\Ticketing\Transformers\Admin;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TicketIndexCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'tickets' => TicketIndexResource::collection($this->collection),
            'metadata' => [
                'resultset' => [
                    'count' => $this->total(),
                    'last_page' => $this->lastPage(),
                    'per_page' => $this->perPage(),
                    ],
                ],
             ];
    }
}

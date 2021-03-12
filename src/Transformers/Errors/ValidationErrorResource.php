<?php

namespace Kohandani\Ticketing\Transformers\Errors;

use Illuminate\Http\Resources\Json\JsonResource;

class ValidationErrorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "status" => 400,
            "developerMessage" => trans('ticketing::validation.developer_validation'),
            "userMessage" => $this->resource,
            "errorCode" => "444444",
        ];
    }
}

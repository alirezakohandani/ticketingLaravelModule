<?php

namespace Kohandani\Ticketing\Traits;


trait CreatedAt
{
    public function getCreatedAttribute()
    {
        $v = \Verta($this->created_at);
        return $v->formatDifference(); 
    }
}
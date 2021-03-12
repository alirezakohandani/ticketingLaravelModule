<?php

namespace Kohandani\Ticketing\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Ticketing\Traits\Createdat;
use Modules\User\Entities\User;

class Message extends Model
{
    use HasFactory, Createdat;

    protected $fillable = ['user_id', 'title', 'description'];
    
    /**
     * Get the ticket that owns the message.
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    /**
     * Get the user that owns the message.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function newFactory()
    {
        return \Modules\Ticketing\Database\factories\MessageFactory::new();
    }

}

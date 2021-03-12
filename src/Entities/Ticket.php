<?php

namespace Kohandani\Ticketing\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Modules\Ticketing\Traits\Createdat;
use Modules\User\Entities\User;

class Ticket extends Model
{
    use HasFactory, Createdat;

    protected $fillable = ['user_id', 'ref_number', 'type', 'status'];

    /**
     * Get the route key for the ticket.
     *
     * @return int
     */
    public function getRouteKeyName()
    {
        return 'ref_number';
    }
    
    /**
     * Get the messages for the ticket.
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Get the user that owns the ticket.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * User registration while storing a ticket
     *
     * @param [string] $email
     * @return id
     */
    public function register($email)
    {
        $user = $this->user()->create([
            'name' => strtok($email, '@'),
            'email' => $email,
            'password' => Hash::make($email),
        ]);
        $user->roles()->attach(1);
        return $user->id;  
    }

    /**
     * Change status
     *
     * @return void
     */
    public function replied()
    {
        $this->status = 'anwserd';
        $this->save();
    }

     /**
     * Change status by the user
     *
     * @return void
     */
    public function followed()
    {
        $this->status = 'pending';
        $this->save();
    }

    /**
     * Finish status
     *
     * @return void
     */
    public function finishedStatus()
    {
        $this->status = 'finished';
        $this->save();
    }

    protected static function newFactory()
    {
        return \Modules\Ticketing\Database\factories\TicketFactory::new();
    }
}

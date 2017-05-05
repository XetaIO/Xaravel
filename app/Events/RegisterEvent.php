<?php
namespace Xetaravel\Events;

use Xetaravel\Models\User;

class RegisterEvent
{
    public $user;

    /**
     * Create a new event instance.
     *
     * @param \Xetaravel\Models\User $user
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class User extends Resource
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
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'photo_url' => $this->photo_url,
            'type' => $this->type,
            'last_shift_start' => $this->last_shift_start,
            'last_shift_end' => $this->last_shift_end,
            'shift_active' => $this->shift_active,
            'blocked' => $this->blocked
        ];
    }
}

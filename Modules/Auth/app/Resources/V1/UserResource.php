<?php

namespace Modules\Auth\app\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id'    => $this->id,
            'name'  => $this->name,
            'email' => [
                'address'     => $this->email,
                'verified' => [
                    'status' => (is_null($this->email_verified_at)) ? false : true,
                    'at'     => (is_null($this->email_verified_at)) ? null : $this->email_verified_at
                ]
            ],
            'phone' => [
                'number'   => $this->phone,
                'verified' => [
                    'status' => (is_null($this->phone_verified_at)) ? false : true,
                    'at'     => (is_null($this->phone_verified_at)) ? null : $this->phone_verified_at
                ]
            ],
        ];
    }
}

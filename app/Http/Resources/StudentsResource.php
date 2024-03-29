<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => (string)$this->id,
            'type' => 'Student',
            'attributes' => [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'phone_no' => $this->phone
            ]
        ];
    }
}

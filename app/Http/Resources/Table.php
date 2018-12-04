<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Table extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
          'id' => $this->id,
          'table_number' => $this->table_number,
          'deleted_at' => $this->deleted_at,
          'created_at' => $this->created_at,
          'updated_at' => $this->updated_at,
        ];
    }
}

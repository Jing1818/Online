<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InternshipResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'cate_name'=>$this->category->cate_name,
            'view_count'=>$this->view_count
        ];
    }
}

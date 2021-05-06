<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InternshipDetailResource extends JsonResource
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
            'title'=>$this->title,
            'desc'=>$this->desc,
            'content'=>$this->content,
            'slider_images'=>$this->slider_images,
            'cate_name'=>$this->category,
            'goal'=>$this->goal,
            'reward_rule'=>$this->rewaed_rules,
            'core_content'=>$this->core_content

        ];
    }
}

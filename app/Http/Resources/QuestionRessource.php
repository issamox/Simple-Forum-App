<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionRessource extends JsonResource
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
            'title' => $this->title,
            'slug' => asset("api/question/$this->slug"),
            'body' => $this->body,
            'user' => $this->user->name,
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}

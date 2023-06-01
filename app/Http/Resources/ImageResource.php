<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            "url" => url($this->path),
            "date" => Carbon::make($this->date)->timestamp,
            "lat" => $this->lat,
            "lng" => $this->lng
        ];
    }
}

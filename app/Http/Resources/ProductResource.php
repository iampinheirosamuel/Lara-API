<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
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
           'name'=> $this->name,
           'description'=> $this->detail,
           'discount'=> $this->discount,

           'price'=> $this->price,

           'totalPrice'=> round((1 - ($this->discount/100)) * $this->price, 2),

           'stock'=> $this->stock == 0 ? 'Out of Stock' : $this->stock,

           'rating'=> count($this->reviews) > 0 ? round($this->reviews->sum('star')/count($this->reviews) , 2) : 'No rating yet',

           'href' => [
                'reviews' => route('reviews.index', $this->id),
                'rating'=> $this->reviews->sum('star')
           ]

        ];
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    //
    /**
     * ブログポストのコメントを取得
     */
    public function cards()
    {
        return $this->hasMany('App\Card','listing_id','id');
    }
}

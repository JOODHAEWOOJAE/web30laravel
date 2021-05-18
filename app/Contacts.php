<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    public function contacts(){
        return $this->belongsTo(Contacts::class);
    }
}

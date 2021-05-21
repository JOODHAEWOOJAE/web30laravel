<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    public function show_socials()
    {
        return $socials = Social::all();
    }
}

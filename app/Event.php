<?php

namespace App;
use App\Event_cat;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //

    public function getEventCategoryAttribute($value)
    {
        return  Event_cat::find($this->category_id)->name;
    }
}

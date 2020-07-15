<?php

namespace App;

use Carbon\Carbon;

use App\AttendanceMetaCategory;
use Illuminate\Database\Eloquent\Model;

class AttendanceMeta extends Model
{
    //
    protected $fillable = ['meta_id', 'user_id', 'name', 'category_id', 'start_time', 'end_time', 'duration', 'active'];

    public function getDisabledAttribute($value)
    {
        return $this->active ?? "disabled=''";
    }

    public function getUcNameAttribute($value)
    {
        return ucwords($this->name);
    }

    public function getCategoryAttribute()
    {
        return AttendanceMetaCategory::find($this->category_id)->name;
    }

    public function getAttdShortAttribute()
    {
        return substr($this->meta_id, 0, 8);
    }

    public function getDateCreatedAttribute()
    {
        return Carbon::parse($this->created_at)->format('D, jS F Y');
    }
}

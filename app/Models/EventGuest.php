<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventGuest extends Model
{
    use HasFactory;

    public $timestamps=true;
    protected $guarded=[];


    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
    public function guestCategory()
    {
        return $this->hasOneThrough(EventGuestCategory::class,  Guest::class,'category_id', 'id');
    }
}

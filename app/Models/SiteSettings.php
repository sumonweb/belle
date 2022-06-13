<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
    use HasFactory;

    protected $fillable = ['sitename', 'logo', 'favicon', 'address', 'phone', 'email', 'gmap_link', 'fb_link', 'tw_link', 'pin_link', 'ins_link', 'yt_link'];

}

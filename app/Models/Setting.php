<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table="settings";
    protected $fillable=['logo','favicon','title','name','footer_descript','nav_color','body_color','banner_image1','banner_image2','banner_image3','meta_title','meta_keywords','meta_descript'];
}

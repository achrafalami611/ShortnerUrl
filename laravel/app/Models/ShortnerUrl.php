<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ShortnerUrl extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'shortnerurls';


    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y H:i:s');
    }
    
}

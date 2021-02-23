<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Hotel extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    use HasFactory;
    protected $guarded = []; // Allows Mass assignments.

    public function getFullAddressAttribute()
    {
        $myAddress = $this->address . ',';
        $myTown = $this->town . ',';
        $myCounty = $this->county . ',';
        $myPostcode = $this->address . ',';
        return $myAddress . $myTown . $myCounty . $myPostcode;
    }
}

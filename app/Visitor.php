<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $primaryKey='id';
    public $incrementing = TRUE;
    protected $timestaps = TRUE;
    protected $fillable =['name','place','count','Data'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $table = "complaint";
    protected $primaryKey = 'com_id';
    protected $fillable = [
        'com_type', 'com_describtion', 'com_startdate',
    ];
}

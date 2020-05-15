<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Absensi extends Model
{
    //
    use SoftDeletes;
protected $table  = "tbl_absensi";

protected $fillable = [
		"id",
		"mata_kuliah",
		"nama",
		"nim",
		"absensi",
		"imei",
		"photo"
];
protected $dates = ['deleted_at'];

}

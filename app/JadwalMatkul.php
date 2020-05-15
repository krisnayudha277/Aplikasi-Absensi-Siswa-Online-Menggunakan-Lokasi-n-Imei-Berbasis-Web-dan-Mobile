<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class JadwalMatkul extends Model
{
    //

use SoftDeletes;
protected $table  = "tbl_matakuliah";

protected $fillable = [
		"id",
		"id_mata_kuliah",
		"mata_kuliah",
		"dosen",
		"hari",
		"jam"
];
protected $dates = ['deleted_at'];

}

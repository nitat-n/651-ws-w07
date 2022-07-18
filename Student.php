<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table="student";
    protected $fillable = ["sid","name","lastname","email"];
    public function program(){
        return $this->belongsTo(Program::class,'std_pid','id');
    }
    public function vaccineRecord(){
        return $this->hasMany(VaccineRecord::class,'std_id','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolFees extends Model
{
    protected $fillable = [
        'school_id' ,'grade_id' , 'year_id' , 'fee_id' ,'fee'
    ]; 
    public function school() {
        return $this ->belongsTo(School::class);
    }
    public function grade() {
        return $this ->belongsTo(Grade::class);
    }
    public function year() {
        return $this ->belongsTo(Year::class);
    }
    public function fee() {
        return $this ->belongsTo(Fee::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    public $guarded = '';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function employee_intervention()
    {
        return $this->hasOne(EmployeeIntervention::class);
    }
}

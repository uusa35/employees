<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeIntervention extends Model
{
    use HasFactory;

    public $guarded = '';

    public function salary() {
        return $this->belongsTo(Salary::class);
    }
}

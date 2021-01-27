<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDegree extends Model
{
    use HasFactory;
    public $table = 'employee_degrees';

    public function user() {
        return $this->hasMany(User::class);
    }
}

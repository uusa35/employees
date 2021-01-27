<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name',
//        'email',
//        'password',
//    ];
    public $guarded = '';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getYearsOfServicesAttribute()
    {
        return (Carbon::now()->format('Y') - Carbon::parse($this->hiring_date)->format('Y') - 1);
    }

    public function getBasicSalaryAttribute()
    {
        return $this->employee_degree->basic_salary + ($this->employee_degree->increment * $this->yearsOfServices);
    }

    public function employee_degree()
    {
        return $this->belongsTo(EmployeeDegree::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function title()
    {
        return $this->belongsTo(Position::class);
    }

    public function social_status()
    {
        return $this->belongsTo(SocialStatus::class);
    }

    public function certificate()
    {
        return $this->belongsTo(Certificate::class);
    }

    public function children()
    {
        return $this->belongsTo(Children::class);
    }

    public function transportation()
    {
        return $this->belongsTo(Transportation::class);
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }

    public function getLastSalaryAttribute()
    {
        return $this->salaries()->orderBy('id', 'desc')->with('employee_intervention')->first();
    }

    public function getNetSalaryAttribute()
    {
        return $this->basicSalary
            + (($this->certificate->percentage / 100) * $this->basicSalary)
            + (($this->title->percentage / 100) * $this->basicSalary)
            + (($this->position->percentage / 100) * $this->basicSalary)
            + ($this->transportation->value)
            + ($this->social_status->value)
            + ($this->children->value)
            + (($this->position->percentage / 100) * $this->basicSalary)
            + (($this->title->percentage / 100) * ($this->basicSalary / 2))
            - ($this->lastSalary->employee_intervention->taxes)
            - ($this->lastSalary->employee_intervention->retirement)
            - ($this->lastSalary->employee_intervention->loan)
            - ($this->lastSalary->employee_intervention->others);
    }
}

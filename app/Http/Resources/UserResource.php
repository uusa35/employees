<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'basic_salary' => number_format($this->basicSalary, 0),
            'employee_degree' => $this->employee_degree_id,
            'years_of_service' => $this->yearsOfServices,
            'hiring_date' => Carbon::parse($this->hiring_date)->format('d-m-Y'),
            'employee_no' => $this->employee_no,
            'employer' => $this->employer,
            'card_id' => $this->card_id,
            'certificate_allowance' => number_format(($this->certificate->percentage / 100) * $this->basicSalary, 0),
            'title_allowance' => number_format(($this->title->percentage / 100) * $this->basicSalary, 0),
            'position_allowance' => number_format(($this->position->percentage / 100) * $this->basicSalary, 0),
            'transportation_allowance' => number_format($this->transportation->value, 0),
            'social_status_allowance' => number_format($this->social_status->value, 0),
            'children_allowance' => number_format($this->children->value, 0),
            'university_service_allowance' => number_format(($this->position->percentage / 100) * $this->basicSalary, 0),
            'other_allowance' => number_format(($this->title->percentage / 100) * ($this->basicSalary / 2), 0),
            'taxes' => number_format($this->lastSalary->employee_intervention->taxes, 0),
            'retirement_allowance' => number_format($this->lastSalary->employee_intervention->retirement, 0),
            'loan' => number_format($this->lastSalary->employee_intervention->loan, 0),
            'other_intervention' => number_format($this->lastSalary->employee_intervention->others, 0),
            'net_salary' => number_format($this->netSalary),

        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'Istifadeci Adi' => $this->full_name,
            'Email' => $this->email,
            'Fin Kodu' => $this->fin_code,
            'Yaradilma Tarixi' => $this->created_at,
            'Yenilenme Tarixi' => $this->updated_at,
        ];
    }
}

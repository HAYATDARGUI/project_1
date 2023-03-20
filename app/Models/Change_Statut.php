<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Change_Statut extends Model
{
    use HasFactory;
    protected $fillable = [
        'ChangeStatut_Ref',
        'ChangeStatut_Description',
    ];
    public function detail_br()
    {
        return $this->hasMany(Detail_Br::class ,'dBR_ChangeStatut');
    }
}

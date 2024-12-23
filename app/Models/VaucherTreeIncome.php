<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaucherTreeIncome extends Model
{
    use HasFactory;
    protected $fillable=['level','share','vaucher_id'];

    public function Vaucher()
    {
        return $this->belongsTo(Vaucher::class, 'vaucher_id', 'id');
    }
}

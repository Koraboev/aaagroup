<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vaucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tur_packet_share',
        'level_up',
        'level_up_detail',
        'hotel_share',
        'cashback',
        'personal_partner_share',
        'promotion'
    ];
    public function vaucher_tree_incomes(): HasMany
    {
        return $this->hasMany(VaucherTreeIncome::class, 'vaucher_id', 'id',);
    }

}

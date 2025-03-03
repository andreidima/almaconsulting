<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProiectTip extends Model
{
    use HasFactory;

    protected $table = 'proiecte_tipuri';
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

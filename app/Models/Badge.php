<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getInplaceThumbAttribute() {
        return 'assets/img/'. match($this->label) {
            'silver' => 'capt.jpg',
            'navy' => 'cyclopse.jpg',
            'blue' => 'iron.jpg',
            'purple' => 'capt.jpg',
            'gray' => 'wolverine.jpg',
            default => 'strange.jpg',
        };
    }
}

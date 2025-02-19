<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountedItem extends Model
{
    protected $fillable = [
        'invoice_id', 
        'tartozik', 
        'kovetel', 
        'total'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}

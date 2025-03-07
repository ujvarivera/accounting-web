<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'no',
        'from',
        'to',
        'date',
        'due_date',
        'total'
    ];

    public function accountedItems()
    {
        return $this->hasMany(AccountedItem::class);
    }

}

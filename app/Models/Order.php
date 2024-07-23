<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'order_date',
        'delivery_date',
        'status'
    ];

    public const ORDER_STATUS = [
        1 => 'Pendente',
        2 => 'Entregue',
        3 => 'Cancelado'
    ];

    public function getStatusNameAttribute() {
        return $this->status ? self::ORDER_STATUS[$this->status] : '';
    }
}

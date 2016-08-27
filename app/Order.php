<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['user_id', 'first_name','last_name', 'email', 'phone', 'address', 'delivery_id', 'payment_id', 'descr', 'cart'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function delivery()
    {
        return $this->hasOne('App\Delivery');
    }

    public function payment()
    {
        return $this->hasOne('App\Payment');
    }

}

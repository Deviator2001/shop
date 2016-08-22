<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function delivery()
    {
        return $this->hasOne('App/Delivery');
    }

    public function payment()
    {
        return $this->hasOne('App/Payment');
    }

}

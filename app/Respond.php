<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Respond extends Model
{
    /**
     * Получить автора данного отклика.
     */
    public function contractor()
    {
        return $this->belongsTo('App\User', 'contractor_id');
    }
}

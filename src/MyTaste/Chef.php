<?php

namespace MyTaste;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    public function greet()
    {
        return 'Hello!';
    }
}

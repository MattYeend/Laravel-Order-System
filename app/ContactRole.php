<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactRole extends Model
{
    protected $fillable = [
        'name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}

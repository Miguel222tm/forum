<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
      /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'languages';

    protected $primaryKey='languageId';

    protected $fillable = ['code', 'description'];
}

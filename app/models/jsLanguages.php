<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class jsLanguages extends Model
{
    protected $table = "jobSeekerLanguages";

    protected $primaryKey = "jobSeekerLanguageId";

    protected $fillable = ['jobSeekerId', 'languageId', 'level', 'code', 'description'];
}

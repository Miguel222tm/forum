<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Certificates extends Model
{
    protected $table= "jobSeekerCertificates";
    protected $primaryKey = "jobSeekerCertificateId";

    protected $fillable = ['jobSeekerId', 'name', 'authority_name', 'number', 'start_date', 'end_date'];
}

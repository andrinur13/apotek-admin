<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelHasRolesModel extends Model
{
    protected $table = 'model_has_roles';
    public $primaryKey = 'model_id';

    protected $fillable = ['role_id', 'model_type', 'model_id'];

}

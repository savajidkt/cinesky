<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Setting extends Model
{
    use HasApiTokens, HasFactory, SoftDeletes, Notifiable;

    protected $table = 'tbl_settings';
    protected $primaryKey = 'id';

    protected $fillable = [
        'app_name',
        'upi',
        'app_email',
        'image',
        'app_version',
        'app_contact',
        'app_description',
        'app_developed_by',
        'app_privacy_policy',
        'app_terms_condition',
        'app_refund_policy',
    ];




}

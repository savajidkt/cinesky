<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Language;
use App\Models\Genre;
use App\Models\Director;
use App\Models\Homecategory;

class Movie extends Authenticatable
{
    use HasApiTokens, HasFactory, SoftDeletes, Notifiable;

    const ACTIVE = 1;
    const INACTIVE = 0;

    /** User types */
    const ADMIN = 1;
    const USER  = 2;

    const STATUS = [
        self::ACTIVE => 'Active',
        self::INACTIVE => 'Inactive'
    ];

    protected $table = 'tbl_movies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'language_id',
        'genre_id',
        'home_cat_id', 
        'director_id',
        'movie_title',
        'movie_subtitle',
        'movie_type',
        'movie_price',
        'release_date', 
        'total_views',
         'vedio_type',
        'movie_url',
        'poster_image',
        'cover_image',
        'movie_description',
        'status',
    ];



    public function scopeStatus($query, $status)
    {
        $status = strtolower($status) =='active'? 1 : 0;
        return $query->where('status', $status);
    }

    /**
     * Method getActionAttribute
     *
     * @return string
     */
    public function getActionAttribute(): string
    {
        $viewAction = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
        $editAction = '<a href="'. route('movies.edit', $this->id).'" class="edit" data-toggle="tooltip" data-original-title="User Edit" data-animation="false"><img src="'.asset("app-assets/images/icons/icons8-edit-64.png").'" width="20"></a>';

        return $editAction.' '.$this->getDeleteButtonAttribute();
    }

    /**
     * Get Delete Button Attribute
     *
     * @param string $class
     * @return string
     */
    public function getDeleteButtonAttribute($class = '')
    {
        return '<a href="'.route('movies.destroy', $this).'" class="delete_action" data-method="delete" data-toggle="tooltip" data-original-title="Delete" data-animation="false"><img src="'.asset("app-assets/images/icons/icons8-remove-48.png").'" width="30"></a>';
    }


    /**
     * Method getStatusAttribute
     *
     * @return string
     */
    public function getStatusNameAttribute(): string
    {
        $status = self::ACTIVE;

        switch($this->status)
        {
            case self::INACTIVE:
                $status = '<a href="javascript:void(0)" class=""><span class="badge badge-danger status_update" data-user_id="'.$this->id.'" data-status="'.$this->status.'">'.self::STATUS[self::INACTIVE].'</span></a>';
                break;
            default:
                $status = '<a href="javascript:void(0)" class=""><span class="badge badge-success status_update" data-user_id="'.$this->id.'" data-status="'.$this->status.'">'.self::STATUS[self::ACTIVE].'</span></a>';
                break;
        }

        return $status;
    }

    public function getImageposterPathAttribute(): string
    {

                $imageposter = '<img src="'.url('storage/app/' . $this->poster_image).'" width="50%">';

                return $imageposter;
    }


    public function getImagecoverPathAttribute(): string
    {

                $imagecover = '<img src="'.url('storage/app/' . $this->cover_image).'" width="50%">';

                return $imagecover;
    }



    public function languages(): HasOne
    {
        return $this->hasOne(Language::class,'id','language_id');

    }


    public function genres(): HasOne
    {
        return $this->hasOne(Genre::class,'id','genre_id');

    }


    public function directors(): HasOne
    {
        return $this->hasOne(Director::class,'id','director_id');

    }


    public function homecategorys(): HasOne
    {
        return $this->hasOne(Homecategory::class,'id','home_cat_id');


    }





}
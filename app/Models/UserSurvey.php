<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserSurvey extends Model
{
    use HasFactory;

    protected $table = "user_surveys";

    // survey statuses
    const COMPLETED     = 1;
    const INPROGRESS    = 2;
    const PENDING       = 3;

    // auto stop statuses
    const YES   = 1;
    const NO    = 0;

    const STATUS = [
        self::COMPLETED => 'Completed',
        self::INPROGRESS => 'Incomplete',
        self::PENDING => 'Incomplete'
    ];

    protected $fillable = [
        'user_id',        
        'status',
        'auto_stop',
    ];

    /**
     * Get the user that owns the UserSurvey
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get all of the comments for the UserSurvey
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions(): HasMany
    {
        return $this->hasMany(UserSurveyAnswer::class, 'user_survey_id', 'id');
    }

    /**
     * Method getStatusAttribute
     *
     * @return string
     */
    public function getSurveyStatusAttribute(): string
    {
        $status = self::PENDING;

        switch($this->status)
        {
            case self::COMPLETED:
                $status = '<a href="javascript:void(0)" class=""><span class="badge badge-success">'.self::STATUS[self::COMPLETED].'</span></a>';
                break;
            case self::INPROGRESS:
                $status = '<a href="javascript:void(0)" class=""><span class="badge badge-danger">'.self::STATUS[self::INPROGRESS].'</span></a>';
                break;
            default:
                $status = '<a href="javascript:void(0)" class=""><span class="badge badge-danger">'.self::STATUS[self::PENDING].'</span></a>';
                break;
        }
        return $status;
    }

}

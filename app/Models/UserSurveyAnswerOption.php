<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSurveyAnswerOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_survey_answer_id',
        'question_option_id',
        'correct_order'
    ];
    /**
     * Get the user that owns the UserSurveyAnswerOption
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(UserSurveyAnswer::class, 'user_survey_answer_id', 'id');
    }
}

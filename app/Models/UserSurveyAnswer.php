<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserSurveyAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_survey_id',
        'user_id',
        'question_id',
        'ri_points',        
        'establishing_report_point',
        'understanding_others_point',
        'embracing_individual_differences_point',
        'developing_trust_point',
        'cultivating_influence_point',
        'lacking_self_awareness_point',
        'lacking_social_awareness_point',
        'self_serving_point',
        'breaking_trust_point',
        'poor_management_of_emotions_point',

    ];

    /**
     * Get the user that owns the UserSurveyAnswer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function survey(): BelongsTo
    {
        return $this->belongsTo(UserSurvey::class, 'user_survey_id', 'id');
    }
    /**
     * Get all of the comments for the UserSurveyAnswer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options(): HasMany
    {
        return $this->hasMany(UserSurveyAnswerOption::class, 'user_survey_answer_id', 'id');
    }
    public function getAttemptIdAttribute()
    {
        return implode(',', optional($this->pluck('question_id'))->toArray());
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionOption extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'option',
        'question_id',
        'order_sorting',
        'establishing_rapport',
        'understanding_others',
        'embracing_individual_differences',
        'developing_trust',
        'cultivating_influence',
        'lacking_self_awareness',
        'lacking_social_awareness',
        'self_serving',
        'breaking_trust',
        'poor_management_of_emotions',
        'status'
    ];
    /**
     * Get the question that owns the QuestionOption
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }
}

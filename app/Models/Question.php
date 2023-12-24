<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;
    const ACTIVE = 1;
    const INACTIVE = 0;

    const STATUS = [
        self::ACTIVE => 'Active',
        self::INACTIVE => 'In Active'
    ];

    const RADIO = 1;
    const DRAG = 2;

    const TYPE = [
        self::RADIO => 'Radio',
        self::DRAG => 'Drag'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'question',
        'type',
        'status'
    ];
    public function options():HasMany
    {
        return $this->hasMany(QuestionOption::class,'question_id','id');
    }
    /**
     * Method getActionAttribute
     *
     * @return string
     */
    public function getActionAttribute(): string
    {
        $viewAction = '<a href="'. route('question.show', $this->id).'" class="edit btn btn-primary btn-sm">View</a>';
        $editAction = '<a href="'. route('question.edit', $this->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
        return $viewAction;
    }

    /**
     * Get Delete Button Attribute
     *
     * @param string $class
     * @return string
     */
    public function getDeleteButtonAttribute($class = '')
    {
        return '<a href="'.route('question.destroy', $this).'" class="edit btn btn-primary btn-sm delete_action" data-method="delete">Delete</a>';
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
                $status = self::STATUS[self::INACTIVE];
                break;
            default:
                $status = self::STATUS[self::ACTIVE];
                break;
        }

        return $status;
    }

    public function getTypeNameAttribute(): string
    {
        $type = self::RADIO;

        switch($this->type)
        {
            case self::DRAG:
                $type = self::TYPE[self::DRAG];
                break;
            default:
                $type = self::TYPE[self::RADIO];
                break;
        }

        return $type;
    }
}

<?php
namespace Xetaravel\Models;

use Eloquence\Behaviours\CountCache\Countable;
use Xetaravel\Models\Article;
use Xetaravel\Models\Gates\CommentGate;
use Xetaio\Mentions\Models\Traits\HasMentionsTrait;
use Xetaravel\Models\Presenters\CommentPresenter;
use Xetaravel\Models\User;

class Comment extends Model
{
    use Countable,
        CommentGate,
        CommentPresenter,
        HasMentionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'article_id',
        'user_id',
        'content'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'content_markdown'
    ];

    /**
     * Return the count cache configuration.
     *
     * @return array
     */
    public function countCaches(): array
    {
        return [
            User::class,
            Article::class
        ];
    }

    /**
     * Get the user that owns the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the article that owns the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}

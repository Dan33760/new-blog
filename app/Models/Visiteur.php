<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Visiteur extends Model
{
    use HasFactory;

    protected $table = 'visiteurs';

    protected $fillable = [
        'nom',
        'email',
    ];

    // Relation avec Article
    public function article(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'commentaires', 'id_article', 'id_visiteur');
    }
}

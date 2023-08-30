<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\Visiteur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'id_user',
        'id_category',
        'titre',
        'contenu',
        'image',
    ];

    // Relation avec Categorie
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    // Relation avec User (Auteur)
    public function auteur()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relation avec Visiteur
    public function visiteurs(): BelongsToMany
    {
        return $this->belongsToMany(Visiteur::class, 'commentaires', 'id_article', 'id_visiteur')
                    ->withPivot('contenu', 'created_at');
    }
}

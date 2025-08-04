<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'category_id',
        'user_id',
        'shipping_info',
        'length_cm',
        'width_cm',
        'height_cm',
        'weight_kg'

    ];


// Relazioni con categorie
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

// Relazioni con utenti
public function user(): BelongsTo
{
return $this->belongsTo(User::class);
}

// Logica per valutazione Articoli
public function setAccepted($value) { 
    $this->is_accepted = $value;
    $this->save();
    return true;
}

// Funzione per conteggio articoli da revisionare
public static function toBeRevisedCount() {

    return Article::where('is_accepted' , null)->count();
}

}

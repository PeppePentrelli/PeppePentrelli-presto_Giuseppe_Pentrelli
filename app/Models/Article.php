<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    use Searchable;

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
    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    // Funzione per conteggio articoli da revisionare
    public static function toBeRevisedCount()
    {

        return Article::where('is_accepted', null)->count();
    }

    // Funzione per ricerca articoli 
    public function toSearchableArray()
    {

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'user_id' => $this->user_id,
            'shipping_info' => $this->shipping_info,
            'length_cm' => $this->length_cm,
            'width_cm' => $this->width_cm,
            'height_cm' => $this->height_cm,
            'weight_kg' => $this->weight_kg,
        ];
    }

    // Relazione con modello Image

    public function images(): HasMany
    {

        return $this->hasMany(Image::class);
    }
}

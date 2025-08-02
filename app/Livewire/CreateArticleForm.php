<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CreateArticleForm extends Component
{

    // Validazioni

#[Validate('required|min:5')]
public $title;

#[Validate('required|min:10')]
public $description;

#[Validate('required|numeric')]
public $price;

#[Validate('required|exists:categories,id')]
public $category_id;

#[Validate('nullable|min:5')]
public $shipping_info;

#[Validate('nullable|numeric|min:0')]
public $length_cm;

#[Validate('nullable|numeric|min:0')]
public $width_cm;

#[Validate('nullable|numeric|min:0')]
public $height_cm;

#[Validate('nullable|numeric|min:0')]
public $weight_kg;

public $category;
public $article;

// Store
public function store() { 
    $this->validate();
$this->article= Article::create([
    'title' => $this->title,
    'description' => $this->description,
    'price' => $this->price,
    'category_id' => $this->category_id,
    'user_id' => Auth::id(), 
    'shipping_info' => $this->shipping_info,
    'length_cm' => $this->length_cm ? : null,
    'width_cm' => $this->width_cm ? : null,
    'height_cm' => $this->height_cm ? : null,
    'weight_kg' => $this->weight_kg ? : null,
]);

$this->reset();
session()->flash('success', 'Articolo pubblicato con successo!');
}

// Render
    public function render()
    {
        return view('livewire.create-article-form');
    }

}


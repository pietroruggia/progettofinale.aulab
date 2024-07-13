<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Image;

class Article extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable =[

        'nome','provenienza','descrizione','prezzo','user_id', 'category_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function setAccepted($value){
        $this->is_accepted = $value;
        $this->save();
        return true;
    }
    public static function toBeRevisedCount(){
    return Article::where('is_accepted', null)->count();
    }

    public function toSearchableArray()
    {
        return[
            'id'=>$this->id,
            'nome'=>$this->nome,
            'provenienza'=>$this->provenienza,
            'descrizione'=>$this->descrizione,
            'categoria'=>$this->category,
            'prezzo'=>$this->prezzo
        ];
    }

    public function images(): HasMany{
        return $this->hasMany(Image::class);
    }
}

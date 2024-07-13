<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Jobs\GoogleVisionLabelImage;

use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\File;

class CreateArticoli extends Component
{
    use WithFileUploads;
    public $images = [];
    public $temporary_images;


    #[Validate('required|min:5')]
    public $nome;
    #[Validate('required|min:3')]
    public $provenienza;
    #[Validate('required|min:10|max:255')]
    public $descrizione;
    #[Validate('required|min:1')]
    public $prezzo;
    #[Validate('required')]
    public $category_id;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function create_article()
    {
        $this->validate();
        $this->article = Article::create(
            [
                'nome' => $this->nome,
                'provenienza' => $this->provenienza,
                'descrizione' => $this->descrizione,
                'prezzo' => $this->prezzo,
                'user_id' => auth()->id(),
                'category_id' => $this->category_id,
            ]
        );

        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create([
                    'path' => $image->store($newFileName, 'public'),
                ]);
                // dispatch(new ResizeImage($newImage->path, 600, 600));
                // dispatch(new GoogleVisionSafeSearch($newImage->id));
                // dispatch(new GoogleVisionLabelImage($newImage->id));
                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 600, 600),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        $this->reset();
        session()->flash('status', 'Articolo creato correttamente');
    }
    public function messages() 
    {
        return [
            'nome.required' => __('ui.req1'),
        'provenienza.required' => __('ui.req2'),
        'descrizione.required' => __('ui.req3'),
        'prezzo.required' => __('ui.req4'),

        'temporary_images.*.max' => 'Il peso massimo deve essere 1MB',
        'temporary_images.max' => 'Il massimo numero di immagini consentito è 6'
        ];
    }
    protected $messages = [
        

    ];
    public function render()
    {
        return view('livewire.create-articoli');
    }

    public function updatedTemporaryImages()
    {
        if (
            $this->validate([

                'temporary_images.*' => 'image|max:1024',
                'temporary_images' => 'max:6',

            ])
        ) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }
    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }
}

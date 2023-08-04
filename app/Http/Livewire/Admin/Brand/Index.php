<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brands;
use Livewire\Component;
use illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $slug;
    public $status;



    protected $rules = [

        'name' => 'required|string',
        'slug' => 'required|string',
        'status' => 'nullable',

    ];

    public function resetInput()
    {
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
    }

    public function storeBrand()

    {
        $this->validate();

        Brands::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? "0" : "1",
        ]);
        session()->flash('message', 'Branche ajouté avec succes !');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function render()
    {
        $brands = Brands::orderBy("id", "DESC")->paginate(10);

        return view('livewire.admin.brand.index', compact("brands"))
            ->extends("layouts.admin")
            ->section("content");
    }
}

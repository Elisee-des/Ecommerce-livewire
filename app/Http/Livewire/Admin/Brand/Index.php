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
    public $brand_id;

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
        $this->brand_id = NULL;
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function openModal()
    {
        $this->resetInput();
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

    public function updateBrand()
    {
        $this->validate();

        Brands::findOrFail($this->brand_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? "1" : "0",
        ]);
        session()->flash('message', 'Branche mise à jour avec succes !');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function editBrand(int $brand_id)
    {
        $this->brand_id = $brand_id;
        $brand = Brands::find($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
    }

    public function deleteBrand($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    public function destroyBrand()
    {
        Brands::findOrFail($this->brand_id)->delete();
        session()->flash('message', 'Branche supprimer avec succes !');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function render()
    {
        $brands = Brands::orderBy("id", "DESC")->paginate(10);

        return view('livewire.admin.brand.index', compact("brands"))
            ->extends('layouts.admin')
            ->section('content');
    }
}

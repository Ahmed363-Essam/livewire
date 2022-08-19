<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Model\category;
use App\Model\product;

use Livewire\WithFileUploads;

class Products extends Component
{
    use WithFileUploads;


    // request 
    public $request;

    // show Table Variable
    public $showTable = true;

    //  activate Edit Mode

    public $editMode = false;

    public $cat_idEdit;

    public $title;
    public $body;
    public $user_id;
    public $cat_id;
    public $photo;



    public $rules = 
    [
        'title' => 'required',
        'body' => 'required',
        'cat_id' => 'required',
        'photo' => 'required'
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName,$this->rules);
    }




    public function render()
    {
        $cats = category::all();
        $products = product::with(['category','users'])->get();

        return view('livewire.products',compact('products','cats'));
    }

    // Add Products

    public function AddProducts()
    {
        $this->showTable = false;

        $this->editMode = false;
    }

    public function InsertProduct()
    {


        $this->validate([
            'title' => 'required',
            'body' => 'required',
            'cat_id' => 'required',
            'photo' => 'required'
        ]);

                
        $post_file_name = $this->photo->getClientOriginalName();

        $this->photo->storeAs('images', $post_file_name, $disk='products'); 
        


        product::create([

            'title'=>$this->title,
            'body'=>$this->body,
            'cat_id'=>$this->cat_id,
            'user_id'=>auth()->user()->id,
            'image'=>$post_file_name

        ]);
        session()->flash('success', 'تمت الاضافة بنجاح  .');
        $this->showTable = true;
    }

    public function deleteProduct($id)
    {
        $products = product::findorfail($id)->delete();

        session()->flash('delete', 'تم الحذف بنجاخ  .');
    }


    // edit

    public function editProduct($id)
    {
        $this->editMode = true;
        $this->showTable =false;

        $this->cat_idEdit = $id;

        $productData = product::findorfail($id);
        
        $this->title = $productData->title;
        $this->body = $productData->body;
        $this->cat_id = $productData->cat_id;

    }

    public function UpdateProduct()
    {

        $this->validate([
            'title' => 'required',
            'body' => 'required',
            'cat_id' => 'required',
            'photo' => 'required'
        ]);

        
       $productUpdate = product::findorfail($this->cat_idEdit);

       $productUpdate->update([
        'title'=>$this->title,
        'body'=>$this->body,
        'cat_id'=>$this->cat_id,
       ]);

       session()->flash('edit', 'تمت التعديل بنجاح  .');
       $this->showTable = true;
       $this->editMode = false;
    }
}

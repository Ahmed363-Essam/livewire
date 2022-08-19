<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Model\category;

use App\Model\product;

class Categories extends Component
{
    // variable for Table Show

    public $showTable = true;

    public $editMode = false;

    public $showProduct = false;

    // variable of form

    public $title;

    public $description;

    // edit variable

   public  $edit_id;


   // request

   public $request;
    
    // validation for rules

    public $rules = 
    [
        'title' => 'required',
        'description' => 'required',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName,$this->rules);
    }


    public function render()
    {
        $categories = category::all();
        return view('livewire.categories',compact('categories'));
    }

    public function AddCat()
    {
        $this->showTable = false;

     
    }

    // add cat in databse

    public function insertCat()
    {

        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

   
        category::create([
            'title'=>$this->title,
            'description'=>$this->description
        ]);

        session()->flash('success', 'تمت الاضافة بنجاح.');

        $this->showTable = true;
    }



    // delete cat
    public function deleteCat($id)
    {
        $Cat_delete = category::findorfail($id)->delete();

        
        session()->flash('delete', ' تمت  الحذف. بنجاح');
    }


    public function editCat($id)
    {
        $this->showTable = false; 
        $this->editMode = true;

        $this->edit_id = $id;
        $cat_data = category::findorfail($id);


        $this->title = $cat_data->title;
        
        $this->description = $cat_data->description;
    }

    public function UpdateCat()
    {
        $cat_data = category::findorfail($this->edit_id );

        $cat_data->update([

            'title'=>$this->title,
            'description'=>$this->description,
        ]);


        session()->flash('edit', ' تمت  التعديل. بنجاح');
        $this->showTable = true;
    }

    public function showProductCat($id)
    {
        $this->showTable= false;

        $this->showProduct = true;
        
        $catProduct = product::where('cat_id',$id)->get();

        $this->request = $catProduct;
    }
}

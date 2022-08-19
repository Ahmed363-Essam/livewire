<form enctype="multipart/form-data">
    <div class="mb-3">
      @if ($editMode == true)
       
          <label for="exampleInputEmail1" class="form-label">تعديل لقب</label>
      @else
      <label for="exampleInputEmail1" class="form-label">إضافة لقب</label>
      @endif

      <input type="text" wire:model='title' class="form-control" id="exampleInputEmail1" placeholder="ادخال اسم المنتج">
      @error('title') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <div class="mb-3">
          @if ($editMode == true)

          <label for="formFile"   class="form-label">تعديل صورة</label>
      @else
      <label for="formFile"   class="form-label">إدخال صورة</label>
      @endif

            <input class="form-control" wire:model='photo' type="file" id="formFile">

            
          @error('photo') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>



    <div class="mb-3">

      @if ($editMode == true)
       
      <label for="exampleInputEmail1" class="form-label">تعديل قسم</label>
  @else
  <label for="formFile"   class="form-label">إدخال قسم</label>
  @endif

        <select class="form-select form-control"  wire:model='cat_id' aria-label="Default select example">
            <option selected>إضافة قسم</option>
            @foreach ($cats as $cat)
            <option value="{{ $cat->id }}">{{ $cat->title }}</option>

            @endforeach
  
          </select>

          @error('cat_id') <span class="error">{{ $message }}</span> @enderror
    </div>





    <div class="mb-3">
      <label for="exampleInputPassword1"  class="form-label">إضافة وصف</label>
      <div class="form-floating">
        <textarea class="form-control" wire:model='body' placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
        @error('body') <span class="error">{{ $message }}</span> @enderror
      </div>
    </div>


    @if ($editMode == true)

    <button type="button" wire:click='UpdateProduct' class="btn btn-primary">Edit Cat</button>
    @else
    <button type="button" wire:click='InsertProduct' class="btn btn-primary">Add Cat</button>
    @endif
    





  </form>
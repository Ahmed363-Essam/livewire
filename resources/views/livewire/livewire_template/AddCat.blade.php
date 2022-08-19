<form>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">إضافة لقب</label>
      <input type="text" wire:model='title' class="form-control" id="exampleInputEmail1" placeholder="ادخال اسم المنتج">
      @error('title') <span class="error">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">إضافة وصف</label>
      <div class="form-floating">
        <textarea class="form-control" wire:model='description' placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
        @error('description') <span class="error">{{ $message }}</span> @enderror
      </div>
    </div>
    
    @if ($editMode == false )
    <button type="button" wire:click='insertCat' class="btn btn-primary">Add Cat</button>
    @else
    <button type="button" wire:click='UpdateCat' class="btn btn-primary">Edit Cat</button>

    @endif

  </form>
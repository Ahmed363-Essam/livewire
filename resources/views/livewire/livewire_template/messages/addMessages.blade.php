<form>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">إضافة رسالة</label>
      <input type="text" value="" wire:model='title' class="form-control" id="exampleInputEmail1" placeholder="ادخال اسم المنتج">
      @error('title') <span class="error">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">الرسالة وصف</label>
      <div class="form-floating">
        <textarea class="form-control" wire:model='body' placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
        @error('body') <span class="error">{{ $message }}</span> @enderror
      </div>
    </div>
    
    <button type="button" wire:click='insertMessage' class="btn btn-primary">Add Message</button>

  </form>
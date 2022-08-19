
    <button type="button" class="btn btn-primary" wire:click='AddCat'> App Categories </button>
    <table class="table table-striped">
        @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if (session()->has('delete'))
        <div class="alert alert-danger">
            {{ session('delete') }}
        </div>
        @endif

        @if (session()->has('edit'))
        <div class="alert alert-info">
            {{ session('edit') }}
        </div>
        @endif
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">title</th>
          <th scope="col">description</th>
          <th scope="col">delete</th>
          <th scope="col"> edit </th>
        </tr> 
      </thead>
      <tbody>

     

        @foreach($categories as $category)
        <tr>
            <th scope="row">{{ $category->id }}</th>
            <td> <p wire:click='showProductCat({{ $category->id }})'> {{ $category->title }} </p> </td>
            <td>{{ $category->description }}</td>
            <td>

                <button wire:click='deleteCat({{ $category->id }})' type="button" class="btn btn-danger"> delete </button>
            </td>
            <td>
              <button wire:click='editCat({{ $category->id }})' type="button" class="btn btn-info"> edit </button>
            </td>
          </tr>


        @endforeach

      </tbody>
</table>
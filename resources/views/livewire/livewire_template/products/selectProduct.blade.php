
    <button type="button" class="btn btn-primary" wire:click='AddProducts'> Add Products </button><table class="table table-striped">
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
          <th scope="col">body</th>
          <th scope="col">image</th>
          <th scope="col">cat name</th>
          <th scope="col">user name</th>
          <th scope="col">delete</th>
          <th scope="col"> edit </th>
        </tr> 
      </thead>
      <tbody>

        @foreach($products as $product)
        <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->title }}</td>
            <td>{{ $product->body }}</td>

            <td> <img src="{{ url('storage/app/images/'.$product->image)}}" alt="" srcset="" style="width: 100px;height: ;100px"> </td>
            <td> {{ $product->category->title }} </td>
            <td> {{ $product->users->name }} </td>
            <td> <button type="button" wire:click='deleteProduct({{ $product->id }})' class="btn btn-danger">delete</button> </td>

            <td> <button type="button" wire:click='editProduct({{ $product->id }})' class="btn btn-info">Edit</button> </td>
          </tr>


        @endforeach

      </tbody>
</table>
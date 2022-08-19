<table class="table table-striped">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">body</th>
      <th scope="col">image</th>
      <th scope="col">cat name</th>
      <th scope="col">user name</th>

    </tr> 
  </thead>
  <tbody>

    @foreach($request as $product)
    <tr>
        <th scope="row">{{ $product->id }}</th>
        <td>{{ $product->title }}</td>
        <td>{{ $product->body }}</td>

        <td> <img src="{{ url('storage/app/images/'.$product->image)}}" alt="" srcset="" style="width: 100px;height: ;100px"> </td>
        <td> {{ $product->category->title }} </td>
        <td> {{ $product->users->name }} </td>

      </tr>


    @endforeach

  </tbody>
</table>
<button wire:click='addMessage'> Add Messages </button>

@if (session()->has('add'))
<div class="alert alert-success">
    {{ session('add') }}
</div>
@endif
<table class="table table-striped">
    <thead>
        <tr>

          <th scope="col">#</th>
    
          <th scope="col">title</th>
          <th scope="col">body</th>
    
    
    
        </tr> 
      </thead>
      <tbody>
    
    @foreach ($messages as $message)
    <tr>
    

        <th scope="row"> {{ $message->id }} </th>
    
        <td> {{ $message->title }}</td>
        <td> {{ $message->message }} </td>
    
    
      </tr>
    
    @endforeach
    
    
    
    
      </tbody>
    </table>
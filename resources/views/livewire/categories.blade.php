<div>


    @if ($showTable)

        @include('livewire.livewire_template.selectCat')
    @elseif($showProduct == true)

        @include('livewire.livewire_template.showProductCat')
    @else
        @include('livewire.livewire_template.AddCat')
    @endif

    



    
  



</div>

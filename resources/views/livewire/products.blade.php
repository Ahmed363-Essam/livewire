<div>
    @if ($showTable)
        @include('livewire.livewire_template.products.selectProduct');   
    @else
         @include('livewire.livewire_template.products.manageProduct');     
    @endif

</div>

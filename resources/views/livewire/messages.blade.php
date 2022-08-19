<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    @if ($showTable)
         @include('livewire.livewire_template.messages.showMessages');   
    @else
        @include('livewire.livewire_template.messages.addMessages');       
    @endif

</div>

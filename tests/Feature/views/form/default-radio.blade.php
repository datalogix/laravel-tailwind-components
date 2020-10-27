@php
    $target = ['radio' => 'a'];
@endphp

<x-form>
    @bind($target)
        <x-group>
            <x-radio name="radio" value="a" />
        </x-group>

        <x-group>
            <x-radio name="radio" value="b" />
        </x-group>
    @endbind

    <x-submit />
</x-form>

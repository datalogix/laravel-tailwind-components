@php
    $target = ['checkbox' => ['a']];
@endphp

<x-form>
    @bind($target)
        <x-group>
            <x-checkbox name="checkbox[]" value="a" />
        </x-group>

        <x-group>
            <x-checkbox name="checkbox[]" value="b" />
        </x-group>
    @endbind

    <x-submit />
</x-form>

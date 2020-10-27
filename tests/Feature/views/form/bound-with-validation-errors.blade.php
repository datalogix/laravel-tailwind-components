@php
    $target = [
        'input' => 'a',
        'textarea' => 'b',
        'select' => 'c',
        'checkbox' => true,
        'radio' => false
    ];
@endphp

<x-form>
    @bind($target)
        <x-input name="input" />

        <x-textarea name="textarea" />

        <x-select name="select" :options="['c' => 'c', 'f' => 'f']" />

        <x-checkbox name="checkbox" />

        <x-group name="radio">
            <x-radio name="radio" />
        </x-group>

        <x-submit />
    @endbind
</x-form>

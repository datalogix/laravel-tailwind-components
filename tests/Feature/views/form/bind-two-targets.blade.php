@php
    $targetA = [
        'input' => 'a',
        'textarea' => 'b',
        'select' => 'c',
        'checkbox' => true,
        'radio' => true
    ];
    $targetB = [
        'input' => 'd',
        'textarea' => 'e',
        'select' => 'f',
        'checkbox' => false,
        'radio' => false
    ];
@endphp

<x-form>
    @bind($targetA)
        <x-input name="input" />

        @bind($targetB)
            <x-textarea name="textarea" />

            <x-select name="select" :options="['c' => 'c', 'f' => 'f']" />

            <x-checkbox name="checkbox" />
        @endbind

        <x-group name="radio">
            <x-radio name="radio" />
        </x-group>

        <x-submit />
    @endbind
</x-form>

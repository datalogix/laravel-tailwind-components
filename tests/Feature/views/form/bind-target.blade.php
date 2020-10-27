@php
    $target = [
        'input' => 'a',
        'textarea' => 'b',
        'select' => 'c',
        'select_model' => collect([['id' => '2']]),
        'multi_select' => ['d', 'e'],
        'checkbox' => true,
        'radio' => true
    ];
@endphp

<x-form>
    @bind($target)
        <x-input name="input" />

        <x-textarea name="textarea" />

        <x-select name="select" :options="['' => '', 'c' => 'c']" />

        <x-select name="select_model" :options="['1' => 'Item 1', '2' => 'Item 2', '3' => 'Item 3']" />

        <x-select name="multi_select" multiple :options="['d' => 'd', 'e' => 'e', 'f' => 'f']" />

        <x-checkbox name="checkbox" />

        <x-group name="radio">
            <x-radio name="radio" />
        </x-group>

        <x-submit />
    @endbind
</x-form>

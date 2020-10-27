@php
    $target = [
        'input' => 'a',
        'textarea' => 'b',
        'select' => 'c',
        'checkbox' => false,
        'radio' => false
    ];
@endphp

<x-form>
    @bind($target)
        <x-input default="d" name="input" />

        <x-textarea default="e" name="textarea" />

        <x-select default="f" name="select" :options="['' => '', 'c' => 'c']" />

        <x-checkbox :default="true" name="checkbox" />

        <x-group name="radio">
            <x-radio :default="true" name="radio" />
        </x-group>

        <x-submit />
    @endbind
</x-form>

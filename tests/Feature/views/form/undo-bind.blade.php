@php
    $target = [
        'input' => 'a',
        'textarea' => 'b',
    ];
@endphp

<x-form>
    @bind($target)
        <x-input name="input" />

        <x-textarea name="textarea" :bind="false" />

        <x-submit />
    @endbind
</x-form>

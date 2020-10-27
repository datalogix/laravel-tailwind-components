<x-form wire:submit.prevent="submit">
    @wire
        <x-input name="input" />

        <x-textarea name="textarea" />

        <x-select name="select" :options="['' => '', 'c' => 'c']" />

        <x-select name="multi_select" multiple :options="['d' => 'd', 'e' => 'e', 'f' => 'f']" />

        <x-checkbox name="checkbox" />

        <x-group name="radio">
            <x-radio name="radio" />
        </x-group>

        <x-submit />
    @endwire
</x-form>

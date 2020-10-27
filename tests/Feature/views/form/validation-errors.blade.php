<x-form>
    <x-input name="input" />

    <x-textarea name="textarea" />

    <x-select name="select" :options="['' => '', 'c' => 'c']" />

    <x-checkbox name="checkbox" />

    <x-group name="radio">
        <x-radio name="radio" />
    </x-group>

    <x-submit />
</x-form>

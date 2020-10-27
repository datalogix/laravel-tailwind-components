<x-form>
    <x-input :show-errors="false" name="input" />

    <x-textarea :show-errors="false" name="textarea" />

    <x-select :show-errors="false" name="select" />

    <x-checkbox :show-errors="false" name="checkbox" />

    <x-group :show-errors="false" name="radio">
        <x-radio :show-errors="false" name="radio" />
    </x-group>

    <x-submit />
</x-form>

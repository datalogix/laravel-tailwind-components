<x-form>
    <x-input default="a" name="input" />

    <x-textarea default="b" name="textarea" />

    <x-select default="c" name="select" :options="['' => '', 'c' => 'c']" />

    <x-checkbox :default="true" name="checkbox" />

    <x-group name="radio">
        <x-radio :default="true" name="radio" />
    </x-group>

    <x-submit />
</x-form>

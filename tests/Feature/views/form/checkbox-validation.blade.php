<x-form>
    <x-group>
        <x-checkbox name="checkbox[]" value="a" />
    </x-group>

    <x-group>
        <x-checkbox name="checkbox[]" value="b" :default="old() ? false : true" />
    </x-group>

    <x-submit />
</x-form>

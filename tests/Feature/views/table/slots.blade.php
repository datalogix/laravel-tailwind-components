<x-table>
    <x-slot name="head">
        <x-heading>ID</x-heading>
        <x-heading>Name</x-heading>
    </x-slot>

    <x-slot name="body">
        <x-row>
            <x-cell>1</x-cell>
            <x-cell>Foo</x-cell>
        </x-row>

        <x-row>
            <x-cell>2</x-cell>
            <x-cell>Bar</x-cell>
        </x-row>
    </x-slot>

    <x-slot name="foot">
        <x-row>
            <x-cell>Total</x-cell>
            <x-cell>FooBar</x-cell>
        </x-row>
    </x-slot>
</x-table>

<x-table
    :cols="['id' => 'ID', 'name' => 'Name', 'actions' => 'Actions']"
    :rows="[['id' => '1', 'name' => 'Foo'], ['id' => '2', 'name' => 'Bar', 'actions' => 'Actions']]"
>
    <x-slot name="actions">
        cell-slot
    </x-slot>
</x-table>

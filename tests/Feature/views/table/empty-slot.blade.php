<x-table :cols="['id' => 'ID', 'name' => 'Name']">
    <x-slot name="empty">
        <x-table.row>
            <x-table.cell colspan="2">
                No data
            </x-table.cell>
        </x-table.row>
    </x-slot>
</x-table>

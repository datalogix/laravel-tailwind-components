<x-form>
    <x-select
        multiple
        name="select[]"
        :default="(old() ? null : ['be', 'nl'])"
        :options="['be' => 'Belgium', 'nl' => 'The Netherlands']"
    />

    <x-input name="another_field" />

    <x-submit />
</x-form>

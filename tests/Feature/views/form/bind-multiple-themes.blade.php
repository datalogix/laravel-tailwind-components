@theme('testing')
    <x-form>
        @theme('default')
            <x-input name="input" />
        @endtheme

        <x-checkbox name="checkbox" />
        <x-radio name="radio" theme="default" />
        <x-textarea name="textarea" />
        <x-select name="select" />
        <x-select multiple name="multiselect" />
    </x-form>
@endtheme

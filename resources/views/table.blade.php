<div {!! $themeProvider->container !!}>
    <table {!! $attributes->merge($themeProvider->table->toArray()) !!}>
        @if($cols->isNotEmpty() || isset($head))
            <thead>
                <tr>
                    @forelse($cols as $key => $col)
                        <x-table.heading>
                            {{ $col }}
                        </x-table.heading>
                    @empty
                        {{ $head }}
                    @endforelse
                </tr>
            </thead>
        @endif

        <tbody>
            @forelse($rows as $row)
                <x-table.row>
                    @foreach($cols as $key => $col)
                        <x-table.cell>
                            {!! ${$key} ?? data_get($row, $key) !!}
                        </x-table.cell>
                    @endforeach
                </x-table.row>
            @empty
                @if(isset($body))
                    {{ $body }}
                @elseif(isset($empty))
                    {{ $empty }}
                @elseif($emptyText)
                    <x-table.row>
                        <td {!! $themeProvider->emptyText !!} colspan="{{ count($cols) }}">
                            {{ $emptyText }}
                        </td>
                    </x-table.row>
                @endif
            @endforelse
        </tbody>

        @if($footer->isNotEmpty() || isset($foot))
            <tfoot>
                @forelse($footer as $row)
                    <x-table.row>
                        @foreach($cols as $key => $col)
                            <x-table.cell>
                                {!! ${$key} ?? data_get($row, $key) !!}
                            </x-table.cell>
                        @endforeach
                    </x-table.row>
                @empty
                    {{ $foot }}
                @endforelse
            </tfoot>
        @endif
    </table>
</div>

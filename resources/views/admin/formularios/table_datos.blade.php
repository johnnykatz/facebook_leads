<div class="table-responsive">
    <table class="table table-responsive" id="formularios-table">
        <thead>
        @foreach($estructura as $campo)
            <th>{!!$campo->COLUMN_NAME!!}</th>
        @endforeach
        </thead>
        <tbody>
        @if(isset($datos))
            @foreach($datos as $dato)
                <tr>
                    @foreach($dato as $item)
                        <td>{!!$item!!}</td>
                        @endforeach

                        </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
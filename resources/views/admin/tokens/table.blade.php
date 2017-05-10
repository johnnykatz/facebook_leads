<div class="table-responsive">
    <table class="table table-responsive" id="tokens-table">
        <thead>
        <th>Token</th>
        <th>Expires At</th>
        {{--<th>Page Id</th>--}}
        {{--<th>Page Name</th>--}}
        {{--<th colspan="3">Action</th>--}}
        </thead>
        <tbody>
        @foreach($tokens as $token)
            <tr>
                <td>{!! $token->token !!}</td>
                <td>{!! $token->expires_at !!}</td>
                {{--<td>{!! $token->page_id !!}</td>--}}
                {{--<td>{!! $token->page_name !!}</td>--}}
                {{--<td>--}}
                    {{--{!! Form::open(['route' => ['admin.tokens.destroy', $token->id], 'method' => 'delete']) !!}--}}
                    {{--<div class='btn-group'>--}}
                        {{--<a href="{!! route('admin.tokens.show', [$token->id]) !!}" class='btn btn-default btn-xs'><i--}}
                                    {{--class="glyphicon glyphicon-eye-open"></i></a>--}}
                        {{--<a href="{!! route('admin.tokens.edit', [$token->id]) !!}" class='btn btn-default btn-xs'><i--}}
                                    {{--class="glyphicon glyphicon-edit"></i></a>--}}
                        {{--{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                    {{--</div>--}}
                    {{--{!! Form::close() !!}--}}
                {{--</td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
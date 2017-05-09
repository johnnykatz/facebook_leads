<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $token->id !!}</p>
</div>

<!-- Token Field -->
<div class="form-group">
    {!! Form::label('token', 'Token:') !!}
    <p>{!! $token->token !!}</p>
</div>

<!-- Expires At Field -->
<div class="form-group">
    {!! Form::label('expires_at', 'Expires At:') !!}
    <p>{!! $token->expires_at !!}</p>
</div>

<!-- Page Id Field -->
<div class="form-group">
    {!! Form::label('page_id', 'Page Id:') !!}
    <p>{!! $token->page_id !!}</p>
</div>

<!-- Page Name Field -->
<div class="form-group">
    {!! Form::label('page_name', 'Page Name:') !!}
    <p>{!! $token->page_name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $token->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $token->updated_at !!}</p>
</div>


<!-- Token Field -->
<div class="form-group col-sm-6">
    {!! Form::label('token', 'Token:') !!}
    {!! Form::text('token', null, ['class' => 'form-control']) !!}
</div>

<!-- Expires At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expires_at', 'Expires At:') !!}
    {!! Form::text('expires_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Page Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('page_id', 'Page Id:') !!}
    {!! Form::text('page_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Page Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('page_name', 'Page Name:') !!}
    {!! Form::text('page_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.tokens.index') !!}" class="btn btn-default">Cancel</a>
</div>

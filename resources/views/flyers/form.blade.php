<div class="form-group">
    {!! Form::label('street', 'Street:') !!}
    {!! Form::text('street', old('street'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', old('city'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('zip', 'Zip/Postal Code:') !!}
    {!! Form::text('zip', old('zip'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('country', 'Country:') !!}
    {!! Form::select('country', \App\Http\Utilities\Country::all(), old('country'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('state', 'State:') !!}
    {!! Form::text('state', old('state'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('price', 'Sale Price:') !!}
    {!! Form::text('price', old('price'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Home Description:') !!}
    {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'rows' => '10']) !!}
</div>

<div class="form-group">
    {!! Form::label('Photos', 'Photos:') !!}
    {!! Form::file('photos', ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Create Flyer', ['class' => 'btn btn-default form-control']) !!}
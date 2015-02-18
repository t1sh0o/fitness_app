
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        {!! Form::open() !!}

            <div class="form-group">
                {!! Form::label('fitness_center', 'Fitness_center:') !!}
                {!! Form::text('fitness_center', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('max_visits', 'Max visits:') !!}
                {!! Form::input('number', 'max_visits', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('expire_date', 'Expiration date:') !!}
                {!! Form::input('date', 'expire_date', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('Add Card', ['class' => "btn btn-success btn-sm"]) !!}
        {!! Form::close() !!}
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-offset-3 col-md-6">
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    </div>
</div>
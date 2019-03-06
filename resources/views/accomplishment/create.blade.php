{!! Form::open(['route' =>'performance-indicators.store','method' => 'POST']) !!}
    <div class="row">
        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            <div class="label-group col-md-6">
                {!! Form::label('name', 'Name:', ['class' => 'control-label', 'pull-right'] ) !!}
            </div>
            <div class="input-group col-md-12">
                {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
            </div>
        </div>
    </div>

    <div class="row">
            <div class="form-group col-lg-3 col-md-3 col-sm-12">
                <div class="label-group col-md-6">
                    {!! Form::label('year_id', 'Year:', ['class' => 'control-label', 'pull-right'] ) !!}
                </div>
                <div class="input-group col-md-12">
                    {!! Form::select('year_id', [''=>'Choose Year'] + $years, null, ['class'=>'form-control'])!!}
                </div>
            </div>
        </div>
{!! Form::close() !!}
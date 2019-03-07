<div class="alert alert-success" id="add-new-alert" style="display: none"></div>
{!! Form::model($performanceIndicator, ['route' =>'targets.store','method' => 'POST']) !!}
    <div class="row">
        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            <div class="label-group col-md-6">
                {!! Form::label('first_quarter', 'First Quarter:', ['class' => 'control-label', 'pull-right'] ) !!}
            </div>
            <div class="input-group col-md-12">
                {!! Form::text('first_quarter', null, ['class' => 'form-control', 'id' => 'first_quarter']) !!}
                {!! Form::hidden('id') !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            <div class="label-group col-md-6">
                {!! Form::label('second_quarter', 'Second Quarter:', ['class' => 'control-label', 'pull-right'] ) !!}
            </div>
            <div class="input-group col-md-12">
                {!! Form::text('second_quarter', null, ['class' => 'form-control', 'id' => 'second_quarter']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            <div class="label-group col-md-6">
                {!! Form::label('third_quarter', 'Third Quarter:', ['class' => 'control-label', 'pull-right'] ) !!}
            </div>
            <div class="input-group col-md-12">
                {!! Form::text('third_quarter', null, ['class' => 'form-control', 'id' => 'third_quarter']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            <div class="label-group col-md-6">
                {!! Form::label('fourth_quarter', 'Fourth Quarter:', ['class' => 'control-label', 'pull-right'] ) !!}
            </div>
            <div class="input-group col-md-12">
                {!! Form::text('fourth_quarter', null, ['class' => 'form-control', 'id' => 'fourth_quarter']) !!}
            </div>
        </div>
    </div>


{!! Form::close() !!}

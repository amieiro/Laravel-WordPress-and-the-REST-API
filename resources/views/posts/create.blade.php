@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear un novo post</div>
                    <div class="card-body">
                        {{ Form::open([
                        'action' => ['PostController@store'],
                        'class' => 'card',
                        ]) }}

                        <div class="col-md-9">
                            <div class="form-group">
                                {{ Form::label('titulo', __('Título') . ' (*)', ['class' => 'form-label']) }}
                                {{ Form::text('titulo', null, ['class' => 'form-control', 'roles' => 'form']) }}
                                @error('name')
                                <div class="invalid-feedback">{{ $errors->first('titulo') }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('contido', __('Contido') . ' (*)', ['class' => 'form-label']) }}
                                {{ Form::textarea('contido', null, ['class' => 'form-control', 'roles' => 'form']) }}

                                @error('name')
                                <div class="invalid-feedback">{{ $errors->first('contido') }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">{{ __('Update post') }}</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


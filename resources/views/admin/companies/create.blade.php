@extends('templates.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.permission.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.companies.store") }}" enctype="multipart/form-data">
            @csrf           <!--admin.permissions.store-->
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.company.fields.name') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.name') }}</span>
            </div>      <!--cruds.company.fields.title_helper-->
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.company.fields.name') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.name') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

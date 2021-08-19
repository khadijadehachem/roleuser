@extends('templates.admin')
@section('css')
    @include('templates.datatableCss')
@endsection

@section('content')
@can('permission_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.permissions.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.permission.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.permission.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <!-- Data list view starts -->
        <section id="data-list-view" class="data-list-view-header">
            <div class="table-responsive">
            <table class="table data-list-view">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.permission.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.permission.fields.title') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $key => $permission)
                        <tr data-entry-id="{{ $permission->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $permission->id ?? '' }}
                            </td>
                            <td>
                                {{ $permission->title ?? '' }}
                            </td>
                            <td>
                                @can('permission_show')
                                    <a  href="{{ route('admin.permissions.show', $permission->id) }}" class="btn btn-icon btn-icon rounded-circle btn-flat-primary waves-effect waves-light">
                                        <span class="action-edit"><i class="feather icon-eye"></i></span>
                                    </a>
                                @endcan

                                @can('permission_edit')
                                    <a  href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-icon btn-icon rounded-circle btn-flat-success waves-effect waves-light">
                                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    </a>
                                @endcan

                                @can('permission_delete')
                                    <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <button type="submit" class="btn btn-icon btn-icon rounded-circle btn-flat-danger waves-effect waves-light">
                                            <span class="action-edit"><i class="feather icon-trash"></i></span>
                                        </button>
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </section>
    </div>
</div>



@endsection
@section('scripts')
@parent
@include('templates.datatableJs')
@endsection

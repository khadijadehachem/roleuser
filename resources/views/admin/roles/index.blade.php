@extends('templates.admin')
@section('css')
    @include('templates.datatableCss')
@endsection

@section('content')
    @can('role_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.roles.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.role.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.role.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <section id="data-list-view" class="data-list-view-header">
                <div class="table-responsive">
                    <table class="table data-list-view">
                        <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.role.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.role.fields.title') }}
                            </th>
                            <th>
                                {{ trans('cruds.role.fields.permissions') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $key => $role)
                            <tr data-entry-id="{{ $role->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $role->id ?? '' }}
                                </td>
                                <td>
                                    {{ $role->title ?? '' }}
                                </td>
                                <td>
                                    @foreach($role->permissions as $key => $item)
                                        <span class="badge badge-info">{{ $item->title }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('role_show')
                                        <a href="{{ route('admin.roles.show', $role->id) }}"
                                           class="btn btn-icon btn-icon rounded-circle btn-flat-primary waves-effect waves-light">
                                            <span class="action-edit"><i class="feather icon-eye"></i></span>
                                        </a>
                                    @endcan

                                    @can('role_edit')
                                        <a href="{{ route('admin.roles.edit', $role->id) }}"
                                           class="btn btn-icon btn-icon rounded-circle btn-flat-success waves-effect waves-light">
                                            <span class="action-edit"><i class="feather icon-edit"></i></span>
                                        </a>
                                    @endcan

                                    @can('role_delete')
                                        <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
                                              onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                              style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <button type="submit"
                                                    class="btn btn-icon btn-icon rounded-circle btn-flat-danger waves-effect waves-light">
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

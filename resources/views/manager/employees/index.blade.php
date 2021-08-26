@extends('templates.manager')
@section('css')
    @include('templates.datatableCss')
@endsection

@section('content')
    @can('user_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("manager.employees.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'User', 'route' => 'manager.users.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}
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
                                {{ trans('cruds.user.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.email') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.email_verified_at') }}
                            </th>
                            <th>
                                category
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.roles') }}
                            </th>
                            <th>
                                plafond
                            </th>
                          
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                            <tr data-entry-id="{{ $user->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $user->id ?? '' }}
                                </td>
                                <td>
                                    {{ $user->name ?? '' }}
                                </td>
                                <td>
                                    {{ $user->email ?? '' }}
                                </td>
                                <td>
                                    {{ $user->email_verified_at ?? '' }}
                                </td>
                                <td>
                                    
                                    <span class="badge badge-info">{{ $user->category->name ?? '' }}</span>
                             
                                </td>
                                <td>
                                    @foreach($user->roles as $key => $item)
                                        <span class="badge badge-info">{{ $item->title }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    
                                    <span class="badge badge-info">{{ $user->plafond ?? '' }}</span>
                             
                                </td>
                                <td>
                                    @can('user_show')
                                        <a href="{{ route('manager.employees.show', $user->id) }}"
                                           class="btn btn-icon btn-icon rounded-circle btn-flat-primary waves-effect waves-light">
                                            <span class="action-edit"><i class="feather icon-eye"></i></span>
                                        </a>
                                    @endcan

                                    @can('user_edit')

                                        <a href="{{ route('manager.employees.edit', $user->id) }}"
                                           class="btn btn-icon btn-icon rounded-circle btn-flat-success waves-effect waves-light">
                                            <span class="action-edit"><i class="feather icon-edit"></i></span>
                                        </a>
                                    @endcan

                                    @can('user_delete')
                                        <form action="{{ route('manager.employees.destroy', $user->id) }}" method="POST"
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

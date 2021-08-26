@extends('templates.manager')
@section('css')
    @include('templates.datatableCss')
@endsection

@section('content')
@can('category_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("manager.categories.create") }}">
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
                    @foreach($categories as $key => $category)
                        <tr data-entry-id="{{ $category->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $category->id ?? '' }}
                            </td>
                            <td>
                                {{ $category->title ?? '' }}
                            </td>
                            <td>
                                @can('category_show')
                                    <a  href="{{ route('manager.categories.show', $category->id) }}" class="btn btn-icon btn-icon rounded-circle btn-flat-primary waves-effect waves-light">
                                        <span class="action-edit"><i class="feather icon-eye"></i></span>
                                    </a>
                                @endcan

                                @can('category')
                                    <a  href="{{ route('manager.categories.edit', $category->id) }}" class="btn btn-icon btn-icon rounded-circle btn-flat-success waves-effect waves-light">
                                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    </a>
                                @endcan

                                @can('category_delete')
                                    <form action="{{ route('manager.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

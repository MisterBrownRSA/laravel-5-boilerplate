@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.roles.management') . ' | ' . __('labels.backend.access.roles.edit'))

@section('page-header')
    <h5 class="mb-4">{{ __('labels.backend.access.roles.management') }}
        <small class="text-muted">{{ __('labels.backend.access.roles.edit') }}</small>
    </h5>
@endsection

@section('content')
    {{ Form::open(['route' => ['admin.auth.role.update', $role], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'patch']) }}

    <div class="card">
        <div class="card-header">
            {{ __('labels.backend.access.roles.edit') }}
        </div><!-- card-header -->

        <div class="card-body">
            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">
                    {{ __('validation.attributes.backend.access.roles.name') }}
                </label>

                <div class="col-md-10">
                    <input type="text" id="name" name="name" class="form-control" placeholder="{{ __('validation.attributes.backend.access.roles.name') }}" value="{{ $role->name }}" maxlength="191" required="required" autofocus="autofocus">
                </div>
            </div><!--form-group-->

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">
                    {{ __('validation.attributes.backend.access.roles.associated_permissions') }}
                </label>

                <div class="col-md-10">
                    @if ($permissions->count())
                        @foreach($permissions as $permission)
                            <div class="checkbox">
                                <label for="permission-{{ $permission->id }}">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="permission-{{ $permission->id }}" {{ in_array($permission->name, $rolePermissions) ? 'checked="checked"' : '' }} />
                                    {{ ucwords($permission->name) }}
                                </label>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div><!--form-group-->
        </div><!-- card-body -->

        <div class="card-footer">
            {{ link_to_route('admin.auth.role.index', __('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-sm']) }}
            {{ Form::submit(__('buttons.general.crud.update'), ['class' => 'btn btn-success btn-sm pull-right']) }}
        </div>
    </div><!--card-->

    {{ Form::close() }}
@endsection

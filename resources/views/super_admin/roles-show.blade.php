<x-layout-super-admin>
    <x-slot name="header">
       
    </x-slot>

    <div class="container">

        <h2>
            {{ __('Show Role') }}
        </h2>

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.showRoles') }}"> Back</a>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $role->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permissions:</strong>
                    @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $v)
                            <label class="label label-success">{{ $v->name }},</label>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout-super-admin>

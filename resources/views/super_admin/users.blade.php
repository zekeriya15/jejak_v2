<x-layout-super-admin>
    <x-slot name="header">
        
    </x-slot>

    <div class="container">

        <h2>
            User Management
        </h2>

        <div class="pull-right">
            <a class="btn btn-success mb-2" href="{{ route('users.create') }}"><i class="fa fa-plus"></i> Create New
                User</a>
        </div>

        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession

        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($data as $key => $user)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if (!empty($user->getRoleNames()))
                            @foreach ($user->getRoleNames() as $v)
                                <label class="badge bg-success">{{ $v }}</label>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('users.show', $user->id) }}"><i
                                class="fa-solid fa-list"></i> Show</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user->id) }}"><i
                                class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>
                                Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {!! $data->links('pagination::bootstrap-5') !!}
    </div>
</x-layout-super-admin>

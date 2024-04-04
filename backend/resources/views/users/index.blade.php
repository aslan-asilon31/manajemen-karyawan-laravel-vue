@extends('../layouts/app_welcome')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-md-flex gap-4 align-items-center">
            <div class="d-none d-md-flex">All Users</div>
            <div class="d-md-flex gap-4 align-items-center">
                <form class="mb-3 mb-md-0">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <select class="form-select">
                                <option>Sort by</option>
                                <option value="desc">Desc</option>
                                <option value="asc">Asc</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <button class="btn btn-outline-light" type="button">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="dropdown ms-auto">
                <a href="#" data-bs-toggle="dropdown"
                   class="btn btn-primary dropdown-toggle"
                   aria-haspopup="true" aria-expanded="false">Actions</a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="#" class="dropdown-item">Action</a>
                    <a href="#" class="dropdown-item">Another action</a>
                    <a href="#" class="dropdown-item">Something else here</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table id="users" class="table table-custom table-lg">
        <thead>
        <tr>
            <th>
                <input class="form-check-input select-all" type="checkbox" data-select-all-target="#users"
                       id="defaultCheck1">
            </th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Department</th>
            <th class="text-end">Action</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>
                        <input class="form-check-input" type="checkbox">
                    </td>
                    <td>
                        <a href="#">
                            <figure class="avatar me-3">
                                <img src="{{ Storage::url('public/users/').$user->image }}"
                                    class="rounded-circle" alt="avatar">
                            </figure>
                        </a>
                    </td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role_name}}</td>
                    <td>{{$user->department_name}}</td>
                    <td class="text-end">
                        <div class="dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                            class="btn btn-floating"
                            aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">View Profile</a>
                                <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="dropdown-item">Edit</a>
                                {{-- <a href="#" class="dropdown-item text-danger">Delete</a> --}}
                                <form id="delete-user-form-{{ $user->id }}" action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <!-- Add a hidden input field with the user's ID -->
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <!-- Add the anchor tag for deletion within the form -->
                                    <a href="#" class="dropdown-item text-danger" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this user?')) { document.getElementById('delete-user-form-{{ $user->id }}').submit(); }">Delete</a>
                                </form>
                                
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <h3>no data</h3>
            @endforelse

        
        </tbody>
    </table>
    {{ $users->links() }}

</div>

@endsection
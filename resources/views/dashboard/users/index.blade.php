 @extends('layouts.dashboard')
 @section('content')
     <div class="card">
         <div class="card-header">
             <h3 class="card-title">Users</h3>

             <div class="card-tools">
                 <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                     <i class="fas fa-minus"></i>
                 </button>
                 <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                     <i class="fas fa-times"></i>
                 </button>
                 <div class="btn btn-outline-success text-success">
                     <a href="{{ route('users.create') }}" class=" text-success">Add New User</a>
                 </div>
             </div>
         </div>

         <div class="card-body p-0">
             <table class="table table-striped projects">

                 <thead>
                     <tr>
                         <th style="width: 20%">
                             Name
                         </th>
                         <th style="width: 30%">
                             Room
                         </th>
                         <th style="width: 30%">
                             Image
                         </th>
                         <th style="width: 30%">
                             Action
                         </th>

                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($users as $user)
                         <tr>
                             <td>
                                 <a>{{ $user->name }}</a>
                                 <br />
                                 <small>{{ $user->email }}</small>
                             </td>
                             <td>
                                 <a>{{ $user->room->name ?? "online" }}</a>
                             </td>
                             <td>
                                 <ul class="list-inline">
                                     <li class="list-inline-item">
                                         <img alt="Avatar" src="{{ asset($user->image) }} "
                                             style="width: 100px;
                                         border:none; outline:none">
                                     </li>
                                 </ul>
                             </td>

                             <td class="project-actions text-center  p-0">

                                 <a class="btn btn-info btn-sm" href="{{ route('users.edit', $user->id) }}">
                                     <i class="fas fa-pencil-alt mr-1">
                                     </i>
                                     Edit
                                 </a>
                                 <form method="post" action="{{ route('users.destroy', $user->id) }}"
                                     style="display: inline-block ; margin:0">
                                     @csrf
                                     @method('DELETE')
                                     <button class="btn btn-danger btn-sm"
                                         onclick="return confirm('Are you sure you want to delete this user?')">
                                         <i class="fas fa-trash mr-1">
                                         </i>Delete</button>
                                 </form>
                             </td>
                         </tr>

                         </td>
                         </tr>
                     @endforeach
                 </tbody>
             </table>

             <div class="d-flex justify-content-center">
                 {{ $users->links() }}
             </div>
         </div>
     </div>
 @endsection







 {{-- ******** --}}




 </div>

 </div>

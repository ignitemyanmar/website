@extends('../admin')
@section('content')
<div class="large-12 columns">
    <div id="icon-users" class="icon32"><br /></div>
        <h2 class="title">Users List  <a href="/user-create" class="button round" style="float:right;">Add New User</a></h2>
	<!-- <h2 class="title">List Users</h5><a href ="adduser"><button type="button" href="" class="btn btn-danger btn-mini" style="float:right">Add New User</button></a> -->
	<table class="" style="width:100% ;cell-spacing:0;">
        <thead>
            <tr>
                <th>No</th>
                <th>User Name</th>
                <th>email</th>
                <th>Latest Modify</th>
                <th style="text-align:center;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->first_name .' '. $user->last_name  }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->updated_at }}</td>                    
                   <td style="text-align:center;"class="center">
                    <a href="/edituser/{{ $user->id }}"  class="buttonaction">Edit</a>
                    @if(Auth::user()->role==8)<a href='/deleteuser/{{$user->id}}' class="buttonaction">Delete</a>@endif
                  </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
    </div>
@stop
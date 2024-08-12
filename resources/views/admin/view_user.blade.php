<!DOCTYPE html>
<html>
<head> 
   @include('admin.css')

   <style>
    .div_deg{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
    }
    .table_deg{
        border: 2px solid greenyellow;
    }
    th{
        background-color: skyblue;
        color: white;
        font-size: 19px;
        font-weight: bold;
        padding: 15px;
    }
    td{
        border: 2px solid skyblue;
        text-align: center;
        color: white;
    }
    input[type='search']{
        width: 500px;
        height: 60px;
        margin-left: 50px; 
    }
   </style>
</head>
<body>
   @include('admin.header')
   @include('admin.sidebar')
   <!-- Sidebar Navigation end-->
   <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <div class="div_deg">
                    <table class="table_deg">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Create At</th>
                            <th>Image</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>

                                <img height="120" width="100" src="users/{{$user->user_image}}">
                            </td>

                            <td>
                              <a class="btn btn-success" href="{{url('/update_user',$user->id)}}">Update</a>
                            </td>

                            <td>
                              <a class="btn btn-danger" onClick="confirmation(event)" href="{{url('/delete_user',$user->id)}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>

                <div class="div_deg">
                    {{$users->onEachSide(1)->links()}}
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->

    <script type="text/javascript">
        function confirmation(ev){
            ev.preventDefault();
        
            var urlToRedirect = ev.currentTarget.getAttribute('href');
        
            console.log(urlToRedirect);
        
            swal({
                title: "Are you Sure To Delete This",
                text: "This delete will be permanent",
                icon: "warning",
                buttons: ["Cancel", "Yes"], // Defining custom buttons with "Cancel" as cancel button
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>
    @include('admin.java')
</body>
</html>

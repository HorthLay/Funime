<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')

   <style type="text/css">

   input[type='text']{
    top: 1px;
    width: 400px;
    height: 40px;
   }
   .div_deg{
    display: flex;
    justify-content: center;
    align-items: center;
   }

   .table_deg{
    text-align: center;
    margin: auto;
    border: 2px solid yellowgreen;
    margin-top: 50px;
    width: 600px;
   }

   th{
    background-color:skyblue;
    padding: 15px;
    font-size: 20px;
    font-weight: bold;
    color: white; 
   }

   td{
    color: white;
    padding: 10px;
    border:1px solid skyblue;
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
            <div>
              @if(session()->has('message'))

              <div class="alert alert-success">

                {{ session()->get('message') }}
              </div>
              @endif
            </div>

              <h1 style="color: white;">Add Category</h1>
            <div class="div_deg">

                <form action="{{url('/category')}}" method="POST">
                    @csrf
                    <div>
                        <input type="text" name="name_en">
                        <input type="text" name="name_kh">
                        <input class="btn btn-primary" type="submit" value="Add Category">
                    </div>
                </form>
            </div>

           

            <div>
              <table class="table_deg">
                <tr>
                  <th>Name English</th>
                  <th>Name Khmer</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                @foreach ($data as $data)
                <tr>
                  <td>{{$data->name_en}}</td>
                  <td>{{$data->name_kh}}</td>
                  <td>
                    <a class="btn btn-success" href="{{url('edit_category',$data->id)}}">Edit</a>
                  </td>
                  <td>
                   <a class="btn btn-danger" onClick="confirmation(event)" href="{{url('delete_category',$data->id)}}">Delete</a>                  
                  </td>
                </tr>
                @endforeach
              </table>
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
      buttons: ["cancel", "Yes"], // Defining custom buttons with "No" as cancel button
      dangerMode: true,
      showCancelButton: false // Hiding cancel button
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location.href = urlToRedirect;
      }
    });
  }
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset ("admincss/vendor/jquery/jquery.min.js")}}"></script>
        <script src="{{asset ("admincss/vendor/popper.js/umd/popper.min.js")}}"> </script>
        <script src="{{asset ("admincss/vendor/bootstrap/js/bootstrap.min.js")}}"></script>
        <script src="{{asset ("admincss/vendor/jquery.cookie/jquery.cookie.js")}}"> </script>
        <script src="{{asset ("admincss/vendor/chart.js/Chart.min.js")}}"></script>
        <script src="{{asset ("admincss/vendor/jquery-validation/jquery.validate.min.js")}}"></script>
        <script src="{{asset ("admincss/js/charts-home.js")}}"></script>
        <script src="{{asset ("admincss/js/front.js")}}"></script>
  </body>
</html>
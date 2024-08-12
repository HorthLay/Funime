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
    h1{
        color: white;
    }
    label{
        display: inline-block;
        width: 200px;
        font-size: 18px!important;
        color: white!important;
    }
    input[type='text']{
    width: 350px;
    height: 50px;
   }
   textarea{
    width: 450px;
    height: 80px;
   }
   .input_deg{
    padding: 15px;
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
            <h1 style="color: white;">Add Product</h1>
            <div class="div_deg">
                <form action="{{url('/upload_user')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                {{-- Name --}}
                    <div class="input_deg">
                    <label>Name</label>
                    <input type="text" name="name" required>
                </div>

               

                {{-- Email --}}

                <div class="input_deg">
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>

                {{-- phone --}}
                <div class="input_deg">
                    <label>Phone</label>
                    <input type="number" name="phone">
                </div>

                
                {{-- address --}}
                <div class="input_deg">
                    <label>Address</label>
                    <input type="description" name="address">
                </div>

                  {{-- usertype --}}
                  <div class="input_deg">
                    <label>Usertype</label>
                    <select name="usertype" required>
                        <option>Select Option</option>
                        <option>admin</option>
                        <option>user</option>
                    </select>
                </div>

                {{-- Password --}}
                <div  class="input_deg">
                    <label>Password</label>
                    <input type="password" name="password">
                </div>

              

                <div class="input_deg">
                    
                    <input class="btn btn-success" type="submit" value="Add Product">
                </div>
                </form>
            </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.java')
  </body>
</html>
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
            <h1 style="color: white;">Article</h1>
            <div class="div_deg">
                <form action="{{url('/article_edit',$articles->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                {{-- title --}}
                    <div class="input_deg">
                    <label> Title </label>
                    <input type="text" name="title" id="title" value="{{$articles->title}}">
                </div>

                {{-- Body --}}

                <div class="input_deg">
                    <label>Body</label>
                    <textarea name="body" id="body">{{$articles->body}}</textarea>
                </div>

                <div class="input_deg">
                  <label>Highlight</label>
                  <textarea name="highlights" id="highlights">{{$articles->highlights}}</textarea>
              </div>

              <div class="input_deg">
                <label for="youtube_video_url">YouTube Video URL</label>
                <input type="text" class="form-control" name="youtube_video_url" id="youtube_video_url" value="{{$articles->youtube_video_url}}">
              
              </div>

              <div class="input_deg">
                <label for="mega_video_url">Mega Movie URL</label>
                <input type="text" class="form-control" name="mega_video_url" id="mega_video_url" value="{{$articles->mega_video_url}}">
              
              </div>

  
             
                

                <div>
                    <label>Curent Images</label>
                    <img width="150px" src="/articles/{{$articles->featured_image}}">
                   </div>

                   <div>
                    <label>New Images</label>
                    <input type="file" name="featured_image">
                  </div>

                  <div>
                    <label>Category</label>
                    <select name="category">
                        <option value="{{$articles->category}}">{{$articles->category}}</option>
                        @foreach ($category as $category)
                        <option value="{{$category->name_en}}">{{$category->name_en}}</option>
                        <option value="{{$category->name_kh}}">{{$category->name_kh}}</option>
                        @endforeach
                    </select>
                 </div>
                <div class="input_deg">
                    
                    <input class="btn btn-success" type="submit" value="Add Article">
                </div>
              
                </form>
            </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.java')
  </body>
</html>
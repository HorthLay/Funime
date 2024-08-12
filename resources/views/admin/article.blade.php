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
    background-color:skyblue;
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
            @if(session()->has('message'))

            <div class="alert alert-success">

              {{ session()->get('message') }}
            </div>
            @endif
          </div>

            <form action="{{url('/product_search')}}" method="GET">
              @csrf
              <input type="search" name="search">
              <input type="submit" class="btn btn-secondary" value="Search">
            </form>
           <div class="div_deg">
            <table class="table_deg">
                <tr>
                  <th>Title</th>
                  <th>Body</th>
                  <th>Highlights</th>
                  <th>Video URL</th>
                  <th>Mega Movie URL</th>
                  <th>Category</th>
                  <th>Featured Image</th>
                  <th>Episodes</th>
                  <th>View Episodes</th>
                  <th>Update</th>
                  <th>Delete</th>
                </tr>
                @foreach($article as $articles)
                <tr>
                    <td>{{$articles->title}}</td>
                    <td>{!!Str::limit($articles->body,20)!!}</td>
                    <td>{!!Str::limit($articles->highlights,20)!!}</td>
                    <td>{!!Str::limit($articles->youtube_video_url,20)!!}</td>
                    <td>{!!Str::limit($articles->mega_video_url,20)!!}</td>
                    <td>{{$articles->category}}</td>
                    <td>
                        <img height="120" width="100" src="articles/{{$articles->featured_image}}">
                    </td>

                    <td>
                      <p>{{ $articles->episodes->count() }}</p>
                    </td>

                    <td>
                      <a class="btn btn-primary" href="{{ route('articles.episodes.view', $articles->id) }}">View</a>
                    </td>

                    <td>
                      <a class="btn btn-success" href="{{url('/update_article',$articles->id)}}">Update</a>
                    </td>

                    <td>
                      <a class="btn btn-danger" onClick="confirmation(event)" href="{{url('/delete_article',$articles->id)}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>

        </div>
        <div class="div_deg">
          {{$article->onEachSide(1)->links()}}
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
    @include('admin.java')
  </body>
</html>
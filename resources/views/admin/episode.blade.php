<!DOCTYPE html>
<html>
<head>
  @include('admin.css')
  <style>
    .div_deg {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 60px;
    }
    .table_deg {
      border: 2px solid greenyellow;
    }
    th {
      background-color: skyblue;
      color: white;
      font-size: 19px;
      font-weight: bold;
      padding: 15px;
    }
    td {
      border: 2px solid skyblue;
      text-align: center;
      color: white;
    }
  </style>
</head>
<body>
  @include('admin.header')
  @include('admin.sidebar')
  <div class="page-content">
    <div class="page-header">
      <div class="container-fluid">
        <h2>Episodes for Article: {{ $article->title }}</h2>
        <a href="{{ route('articles.episodes.create', $article->id) }}" class="btn btn-primary">Add Episode</a>
        <div class="div_deg">
          <table class="table_deg">
            <tr>
              <th>Title</th>
              <th>Description</th>
              <th>Video URL</th>
              <th>Update</th>
              <th>Delete</th>
            </tr>
            @foreach($article->episodes as $episode)
            <tr>
              <td>{{ $episode->title }}</td>
              <td>{!! Str::limit($episode->description, 20) !!}</td>
              <td>{!! Str::limit($episode->video_url, 20) !!}</td>
              <td>
                <a class="btn btn-success" href="{{ route('articles.episodes.edit', ['article' => $article->id, 'episode' => $episode->id]) }}">Update</a>
              </td>
              <td>
                <form action="{{ route('articles.episodes.delete', ['article' => $article->id, 'episode' => $episode->id]) }}" method="POST" style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
  @include('admin.java')
</body>
</html>

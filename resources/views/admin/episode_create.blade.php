<!DOCTYPE html>
<html>
<head>
  @include('admin.css')
</head>
<body>
  @include('admin.header')
  @include('admin.sidebar')

  <div class="page-content">
    <div class="container-fluid">
      <h2>Add Episode to {{ $article->title }}</h2>

      <form action="{{ route('articles.episodes.store', $article->id) }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="title">Episode Title:</label>
          <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="description">Description:</label>
          <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
          <label for="video_url">Video URL:</label>
          <input type="url" name="video_url" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Episode</button>
      </form>
    </div>
  </div>

  @include('admin.java')
</body>
</html>

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
      <h2>Edit Episode of {{ $article->title }}</h2>

      <form action="{{ route('articles.episodes.update', ['article' => $article->id, 'episode' => $episode->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="title">Episode Title:</label>
          <input type="text" name="title" class="form-control" value="{{ $episode->title }}" required>
        </div>
        <div class="form-group">
          <label for="description">Description:</label>
          <textarea name="description" class="form-control" required>{{ $episode->description }}</textarea>
        </div>
        <div class="form-group">
          <label for="video_url">Video URL:</label>
          <input type="url" name="video_url" class="form-control" value="{{ $episode->video_url }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Episode</button>
      </form>
    </div>
  </div>

  @include('admin.java')
</body>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tags</title>
  </head>
  <body>

    @foreach($tags as $tag)

      <a href="{{ route('tag.show', $tag->id) }}">{{ $tag->name }}</a>
      <br>
    @endforeach

  </body>
</html>

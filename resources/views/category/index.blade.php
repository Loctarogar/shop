<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Categories</title>
  </head>
  <body>

    @foreach($categories as $category)

      <a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a>
      <br>
    @endforeach

  </body>
</html>

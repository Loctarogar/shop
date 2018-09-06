<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<body>

Create Page
<p></p>
<br>

<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
@csrf


  <label>Name</label>
    <input type="text" name="name"><br>

  <label>Price</label>
    <input type="text" name="price"><br>

  <label>Description</label>
    <input type="text" name="description"><br>

  <div class="form-group">
    <label>Category select</label>
    <select name="category_id" class="form-control">
      @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label>Tag select</label>
    <select multiple name="tags[]" class="form-control">
      @foreach($tags as $tag)
        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
      @endforeach
    </select>
  </div>

  <label>Select image to upload:</label>

  <input type="file" name="file"><br>

  <input type="submit" value="Upload" name="submit">

</form>

</body>
</html>

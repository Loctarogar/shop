<!DOCTYPE html>
<html>
<body>

Create Page
<p></p>
<br>

<img src="{{asset('uploads/'. $product->image )}}" width="150"/>
<br>

<form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
  <input name="_method" type="hidden" value="PUT">
@csrf


  <label>Name</label>
    <input type="text" name="name" value="{{ $product->name }}"><br>

  <label>Price</label>
    <input type="text" name="price" value="{{ $product->price }}"><br>

  <label>Description</label>
    <input type="text" name="description" value="{{ $product->description }}"><br>

  <label>Select image to upload:</label>

  <input type="file" name="file" value="{{ $product->image }}"><br>

  <input type="submit" value="Upload" name="edit">

</form>

</body>
</html>

<!DOCTYPE html>
<html>
<body>

Create Category
<p></p>
<br>

<form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
@csrf


  <label>Name</label>
    <input type="text" name="name"><br>

  <input type="submit" value="Upload" name="submit">

</form>

</body>
</html>

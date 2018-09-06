<!DOCTYPE html>
<html>
<body>

Create Tag
<p></p>
<br>

<form action="{{ route('tag.store') }}" method="post" enctype="multipart/form-data">
@csrf


  <label>Name</label>
    <input type="text" name="name"><br>

  <input type="submit" value="Upload" name="submit">

</form>

</body>
</html>

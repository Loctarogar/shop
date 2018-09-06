{{ $product->name }}
<br>

<img src="{{asset('uploads/'. $product->image )}}" width="150"/>
<form action="{{ route('product.destroy', $product->id) }}" method="post" enctype="multipart/form-data">

  <input name="_method" type="hidden" value="DELETE">
  @csrf

  <input type="submit" value="Delete" name="edit">

</form>

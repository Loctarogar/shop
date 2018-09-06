@extends("admin.admin-index")

@section("content")
<div class="container">
<div class="row">

  <div class="col-md-8">

    <table class="table table-bordered table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">N</th>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $i = 0;
         ?>
        @foreach($categories as $category)
        <?php
          $i++;
         ?>
        <tr>
          <td scope="row">{{ $i }}</td>
          <td>{{ $category->id }}</td>
          <td><a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a></td>
        </tr>

        @endforeach
      </tbody>
    </table>
  </div>

  <div class="col-md-4">
    Create new category
    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <label>Name</label>
      <input type="text" name="name"><br>
      <input type="submit" value="Create" name="submit">
    </form>
  </div>
</div>

</div>
@endsection

@extends("admin.admin-index")

@section("content")

  Id: {{ $category->id }}
  <br>
  Name: {{ $category->name }}

@endsection

@extends("admin.admin-index")

@section("content")

  Id: {{ $tag->id }}
  <br>
  Name: {{ $tag->name }}

@endsection

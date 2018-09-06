<h1 class="my-4">Admin's Panel</h1>
<div class="list-group">
  <a class="nav-link dropdown-toggle list-group-item" data-toggle="dropdown" href="#" role="button"
            aria-haspopup="true" aria-expanded="false">Sort by Category</a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
   @foreach($categories as $category)
    <a class="dropdown-item" href="{{ route('admin.productsByCategory', $category->id) }}">{{ $category->name }}</a>
   @endforeach
  </div>
    <a href="{{ route('admin.dashboard') }}" class="list-group-item">Show all Products</a>
    <a href="{{ route('admin.product.create') }}" class="list-group-item">Create Product</a>
    <a href="{{ route('category.index') }}" class="list-group-item">Show categories</a>
    <a href="{{ route('tag.index') }}" class="list-group-item">Show tags</a>
</div>

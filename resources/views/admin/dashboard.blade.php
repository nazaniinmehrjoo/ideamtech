@extends('layouts.app2')

@section('content')
  <style>
    .dashboard-header{
      text-align: center;
    }
    .main-content {
      margin-left: 5%;
      padding: 20px;
      direction:rtl;
    }
    .action-btn {
      float: left;
    }
    .table thead {
      background-color: #343a40;
      color: #f8f9fa;
    }
    .btn .btn-outline-success .mb-3{
      text-align: center;
    }
    #products{
      text-align: right;
    }
    #categories{
      text-align: right;
    }
    
  </style>

  <!-- Main Content -->
  <div class="main-content">
    <div class="dashboard-header">
      <h2>داشبورد مدیریت</h2>
      <p>به پنل مدیریت خوش آمدید. اینجا می‌توانید محصولات و دسته‌بندی‌ها را مدیریت کنید.</p>
    </div>

    <!-- Products Section -->
    <div id="products">
      <h3 class="text-light">مدیریت محصولات</h3>
      <a href="{{ route('products.create') }}" class="btn btn-outline-success mb-3"><i class="fas fa-plus"></i> افزودن محصول جدید</a>
      <table class="table table-dark table-hover">
        <thead>
          <tr>
            @foreach($productHeaders as $header)
              <th>{{ $header }}</th>
            @endforeach
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
            <tr>
              <td>{{ $product->id }}</td>
              <td>{{ $product->name }}</td>
              <td>{{ $product->category->name ?? 'بدون دسته‌بندی' }}</td>
              <td>{{ \Illuminate\Support\Str::limit($product->description, 50) }}</td>
              <td><img src="{{ asset('storage/' . $product->image) }}" alt="Image" style="width: 50px;"></td>
              <td>{{ $product->page_name }}</td>
              <td>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">ویرایش</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- Categories Section -->
    <div id="categories">
      <h3 class="text-light">مدیریت دسته‌بندی‌ها</h3>
      <a href="{{ route('categories.create') }}" class="btn btn-outline-success mb-3"><i class="fas fa-plus"></i> افزودن دسته‌بندی جدید</a>
      <table class="table table-dark table-hover">
        <thead>
          <tr>
            @foreach($categoryHeaders as $header)
              <th>{{ $header }}</th>
            @endforeach
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $category)
            <tr>
              <td>{{ $category->id }}</td>
              <td>{{ $category->name }}</td>
              <td>{{ $category->page_name }}</td>
              <td>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">ویرایش</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection

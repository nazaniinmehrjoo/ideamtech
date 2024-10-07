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
    #products, #categories, #services {
      text-align: right;
    }
  </style>

  <!-- Main Content -->
  <div class="main-content">
    <div class="dashboard-header">
      <h2>داشبورد مدیریت</h2>
      <p>به پنل مدیریت خوش آمدید. اینجا می‌توانید محصولات، دسته‌بندی‌ها و خدمات را مدیریت کنید.</p>
    </div>

    <!-- Products Section -->
    <div id="products">
      <h3 class="text-light">مدیریت محصولات</h3>
      <a href="{{ route('products.create') }}" class="btn btn-outline-success mb-3"><i class="fas fa-plus"></i> افزودن محصول جدید</a>
      <table class="table table-dark table-hover">
        <thead>
          <tr>
            <th>شناسه</th>
            <th>نام</th>
            <th>دسته‌بندی</th>
            <th>توضیحات</th>
            <th>تصویر</th>
            <th>صفحه محصول</th>
            <th>عملیات</th>
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
                  <button type="button" class="btn btn-danger btn-sm delete-btn">حذف</button>
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
            <th>شناسه</th>
            <th>نام</th>
            <th>صفحه دسته‌بندی</th>
            <th>عملیات</th>
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
                  <button type="button" class="btn btn-danger btn-sm delete-btn">حذف</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- Services Section -->
    <div id="services">
    <h3 class="text-light">مدیریت خدمات</h3>
    <a href="{{ route('services.create') }}" class="btn btn-outline-success mb-3"><i class="fas fa-plus"></i> افزودن خدمت جدید</a>
    <table class="table table-dark table-hover">
        <thead>
          <tr>
            @foreach($serviceHeaders as $header)
              <th>{{ $header }}</th>
            @endforeach
          </tr>
        </thead>
        <tbody>
          @foreach($services as $service)
            <tr>
              <td>{{ $service->id }}</td>
              <td>{{ $service->title }}</td>
              <td>{{ $service->category ?? 'بدون دسته‌بندی' }}</td> 
              <td>{{ \Illuminate\Support\Str::limit($service->content, 50) }}</td>
              <td>
                @foreach(json_decode($service->banner_images) as $image)
                  <img src="{{ asset('storage/' . $image) }}" alt="Image" style="width: 50px;">
                @endforeach
              </td>
              <td>
                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning btn-sm">ویرایش</a>
                <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline-block;">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-danger btn-sm delete-btn">حذف</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
</div>
  </div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-btn');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent default form submission

            if (confirm('آیا مطمئن هستید که می‌خواهید این مورد را حذف کنید؟')) {
                const form = this.closest('form'); // Find the closest form
                const formData = new FormData(form); // Gather form data

                // Perform AJAX request
                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json(); // Expect a JSON response from the server
                })
                .then(data => {
                    if (data.success) {
                        alert(data.message || 'دسته‌بندی با موفقیت حذف شد.');
                        form.closest('tr').remove(); // Remove the deleted row from the table
                    } else {
                        alert(data.message || 'خطایی رخ داده است.');
                    }
                })
                .catch(error => {
                    alert('خطایی رخ داده است.');
                    console.error('Error:', error); // Log the error to the console
                });
            }
        });
    });
});

</script>


@endsection

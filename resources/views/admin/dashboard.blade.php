@extends('layouts.app2')

@section('content')

<!-- Main Content -->
<div class="container main-content">
  <!-- Dashboard Header -->
  <div class="dashboard-header">
    <h2 class="text-light">داشبورد مدیریت</h2>
    <p class="lead text-secondary">به پنل مدیریت خوش آمدید. اینجا می‌توانید محصولات، دسته‌بندی‌ها، خدمات، پروژه‌ها و بلاگ‌ها را مدیریت کنید.</p>
  </div>

  <!-- Dashboard Grid -->
  <div class="dashboard-grid">
    <!-- Products Card -->
    <div class="dashboard-card shadow-lg">
      <div class="card-icon">
        <i class="fas fa-box"></i>
      </div>
      <h3>مدیریت محصولات</h3>
      <p>افزودن، ویرایش و حذف محصولات فروشگاه شما.</p>
      <div class="action-btns">
        <a href="{{ route('products.create') }}" class="btn btn-outline-light">افزودن محصول جدید</a>
        <a href="{{ route('products.index') }}" class="btn btn-outline-light">مشاهده محصولات</a>
      </div>

      <!-- Products List with Images and CRUD Icons -->
      <div class="item-list">
        <ul>
          @foreach($products as $product)
            <li>
              <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
              <span>{{ $product->name }}</span>
              <div class="crud-icons">
                <a href="{{ route('products.edit', $product->id) }}" title="ویرایش"><i class="fas fa-pencil-alt"></i></a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" style="background:none;border:none;color:inherit;" title="حذف"><i class="fas fa-trash-alt"></i></button>
                </form>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>

    <!-- Blog Posts Card -->
    <div class="dashboard-card shadow-lg">
      <div class="card-icon">
        <i class="fas fa-blog"></i>
      </div>
      <h3>مدیریت مقالات</h3>
      <p>مدیریت و انتشار مقالات در وبلاگ سایت.</p>
      <div class="action-btns">
        <a href="{{ route('blog.create') }}" class="btn btn-outline-light">افزودن مقاله جدید</a>
        <a href="{{ route('blog.index') }}" class="btn btn-outline-light">مشاهده مقالات</a>
      </div>

      <!-- Blog Posts List with Images and CRUD Icons -->
      <div class="item-list">
        <ul>
          @foreach($posts as $post)
            <li>
              <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
              <span>{{ $post->title }}</span>
              <div class="crud-icons">
                <a href="{{ route('blog.edit', $post->id) }}" title="ویرایش"><i class="fas fa-pencil-alt"></i></a>
                <form action="{{ route('blog.destroy', $post->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" style="background:none;border:none;color:inherit;" title="حذف"><i class="fas fa-trash-alt"></i></button>
                </form>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>

    <!-- Categories Card (No Images) -->
    <div class="dashboard-card shadow-lg">
      <div class="card-icon">
        <i class="fas fa-tags"></i>
      </div>
      <h3>مدیریت دسته‌بندی‌ها</h3>
      <p>مدیریت دسته‌بندی محصولات و مقالات.</p>
      <div class="action-btns">
        <a href="{{ route('categories.create') }}" class="btn btn-outline-light">افزودن دسته‌بندی جدید</a>
        <a href="{{ route('categories.index') }}" class="btn btn-outline-light">مشاهده دسته‌بندی‌ها</a>
      </div>

      <!-- Categories List (No Images) -->
      <div class="item-list">
        <ul>
          @foreach($categories as $category)
            <li>
              <span>{{ $category->name }}</span>
              <div class="crud-icons">
                <a href="{{ route('categories.edit', $category->id) }}" title="ویرایش"><i class="fas fa-pencil-alt"></i></a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" style="background:none;border:none;color:inherit;" title="حذف"><i class="fas fa-trash-alt"></i></button>
                </form>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>

    <!-- Services Card (With Multiple Images) -->
    <div class="dashboard-card shadow-lg">
      <div class="card-icon">
        <i class="fas fa-concierge-bell"></i>
      </div>
      <h3>مدیریت سرویس‌ها</h3>
      <p>مدیریت و ارائه خدمات به مشتریان.</p>
      <div class="action-btns">
        <a href="{{ route('services.create') }}" class="btn btn-outline-light">افزودن سرویس جدید</a>
        <a href="{{ route('services.index') }}" class="btn btn-outline-light">مشاهده سرویس‌ها</a>
      </div>

      <!-- Services List with Multiple Images and CRUD Icons -->
      <div class="item-list">
        <ul>
          @foreach($services as $service)
            <li>
              @foreach(json_decode($service->banner_images) as $image)
                <img src="{{ asset('storage/' . $image) }}" alt="Image">
              @endforeach
              <span>{{ $service->title }}</span>
              <div class="crud-icons">
                <a href="{{ route('services.edit', $service->id) }}" title="ویرایش"><i class="fas fa-pencil-alt"></i></a>
                <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" style="background:none;border:none;color:inherit;" title="حذف"><i class="fas fa-trash-alt"></i></button>
                </form>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>

    <!-- Projects Card (No Images) -->
    <div class="dashboard-card shadow-lg">
      <div class="card-icon">
        <i class="fas fa-project-diagram"></i>
      </div>
      <h3>مدیریت پروژه‌ها</h3>
      <p>مدیریت پروژه‌های در حال انجام و انجام شده.</p>
      <div class="action-btns">
        <a href="{{ route('projects.create') }}" class="btn btn-outline-light">افزودن پروژه جدید</a>
        <a href="{{ route('projects.index') }}" class="btn btn-outline-light">مشاهده پروژه‌ها</a>
      </div>

      <!-- Projects List (No Images) -->
      <div class="item-list">
        <ul>
          @foreach($projects as $project)
            <li>
              <span>{{ $project->name }}</span>
              <div class="crud-icons">
                <a href="{{ route('projects.edit', $project->id) }}" title="ویرایش"><i class="fas fa-pencil-alt"></i></a>
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" style="background:none;border:none;color:inherit;" title="حذف"><i class="fas fa-trash-alt"></i></button>
                </form>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection

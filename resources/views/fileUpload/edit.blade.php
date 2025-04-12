@extends('layouts.app')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@400&display=swap');

        #drop-area {
            border: 2px dashed #aaa;
            padding: 20px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #333;
            border-radius: 8px;
            min-height: 2in;
            flex-direction: column;
            gap: 10px;
            cursor: pointer;
        }

        #drop-area input[type="file"] {
            opacity: 0;
            position: absolute;
            height: 100%;
            width: 100%;
            cursor: pointer;
        }

        #drop-area.is-active {
            border-color: #007bff;
            background-color: #2a2a2a;
        }

        .label {
            font-size: 18px;
            color: #888;
        }

        .alert-doc-info {
            background: #444;
            color: #eee;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
        }

    </style>

    <div class="container" style="padding: 3%;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Logo -->
                <div class="text-center mb-4">
                    <img src="/assets/images/logotest2.png" alt="Logo">
                </div>

                <!-- Dark Card -->
                <div class="card bg-dark text-white">
                    <div class="card-header text-center">افزودن نسخه جدید</div>

                    <div class="card-body">
                        <div class="alert-doc-info">
                            <strong>کد مدرک:</strong> {{ $document->owner_code }}-{{ $document->doc_type_code }}-{{ str_pad($document->serial_number, 3, '0', STR_PAD_LEFT) }}<br>
                            <strong>آخرین نسخه:</strong> {{ $document->revision_number }}<br>
                            <strong>تاریخ ثبت آخرین نسخه:</strong> {{ $document->created_at->format('Y-m-d') }}
                        </div>

                        <form method="POST" action="{{ route('documents.update', ['locale' => app()->getLocale(), 'id' => $document->id]) }}" enctype="multipart/form-data" style="direction: rtl;">
                            @csrf
                            @method('PUT')

                            <!-- File Input -->
                            <div class="mb-3">
                                <label for="file" class="form-label">فایل جدید</label>
                                <div class="file-drop-area" id="drop-area">
                                    <span class="label">فایل را بکشید یا کلیک کنید</span>
                                    <input type="file" name="file" id="file" required class="@error('file') is-invalid @enderror">
                                </div>
                                @error('file')
                                    <span class="invalid-feedback d-block mt-2" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <!-- Submit -->
                            <div class="mt-4">
                                <button type="submit" class="btn btn-success w-100">ثبت نسخه جدید</button>
                                <a href="{{ route('documents.index', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary mt-2 w-100">بازگشت</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const dropArea = document.getElementById('drop-area');
        const fileInput = document.getElementById('file');
        const label = dropArea.querySelector('.label');

        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, e => {
                e.preventDefault();
                e.stopPropagation();
                dropArea.classList.add('is-active');
            });
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, e => {
                e.preventDefault();
                e.stopPropagation();
                dropArea.classList.remove('is-active');
            });
        });

        dropArea.addEventListener('drop', e => {
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                fileInput.files = files;
                label.textContent = files[0].name;
            }
        });

        fileInput.addEventListener('change', () => {
            if (fileInput.files.length > 0) {
                label.textContent = fileInput.files[0].name;
            }
        });
    </script>
@endsection

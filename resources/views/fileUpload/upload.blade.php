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

        .drop-text {
            font-size: 18px;
            color: #888;
        }

        #dropped-content {
            width: calc(100% - 23px);
            height: 200px;
            min-height: 69px;
            max-height: 312px;
            margin-top: 20px;
            font-size: 16px;
            padding: 10px;
            border: 1px solid #555;
            resize: vertical;
            background-color: #444;
            color: #fff;
            outline: none;
            border-radius: 8px;
        }

        #dropped-content::-webkit-scrollbar {
            width: 8px;
        }

        #dropped-content::-webkit-scrollbar-track {
            background-color: #444;
        }

        #dropped-content::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 4px;
        }

        #dropped-content::-webkit-scrollbar-thumb:hover {
            background-color: #aaa;
        }

        .drop-icon i {
            color: #888;
            font-size: 4.5rem;
        }

        #chars {
            color: #888;
            float: right;
        }

        #spellcheck {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        #outer-dot {
            background-color: #007bff;
            width: 3rem;
            height: 1.5rem;
            border-radius: 100px;
            cursor: pointer;
            display: flex;
            align-items: center;
            transition: background 200ms;
        }

        #dot {
            background-color: #eee;
            width: 1rem;
            height: 1rem;
            border-radius: 50%;
            margin: 0 5px;
            transform: translateX(22px);
            transition: transform 200ms;
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
                    <div class="card-header text-center">{{ __('documentUpload.title') }}</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('documents.upload', ['locale' => app()->getLocale()]) }}" method="POST"
                            enctype="multipart/form-data" style="direction: rtl;">
                            @csrf

                            <!-- Owner Code -->
                            <div class="row mb-3">
                                <label for="owner_code"
                                    class="col-md-4 col-form-label text-md-end">{{ __('documentUpload.owner_code') }}</label>
                                <div class="col-md-6">
                                    <select name="owner_code" id="owner_code"
                                        class="form-control bg-dark text-white @error('owner_code') is-invalid @enderror"
                                        required>
                                        <option value="">{{ __('documentUpload.choose_option') }}</option>
                                        @foreach(__('documentUpload.units') as $code => $name)
                                            <option value="{{ $code }}" {{ old('owner_code') == $code ? 'selected' : '' }}>
                                                {{ $name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('owner_code')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Doc Type -->
                            <div class="row mb-3">
                                <label for="doc_type_code"
                                    class="col-md-4 col-form-label text-md-end">{{ __('documentUpload.doc_type_code') }}</label>
                                <div class="col-md-6">
                                    <select name="doc_type_code" id="doc_type_code"
                                        class="form-control bg-dark text-white @error('doc_type_code') is-invalid @enderror"
                                        required>
                                        <option value="">{{ __('documentUpload.choose_option') }}</option>
                                        <optgroup label="{{ __('documentUpload.system_docs') }}">
                                            @foreach(['PS', 'PR', 'IN', 'FR'] as $code)
                                                <option value="{{ $code }}" {{ old('doc_type_code') == $code ? 'selected' : '' }}>
                                                    {{ __('documentUpload.types.' . $code) }}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="{{ __('documentUpload.org_docs') }}">
                                            @foreach(['ST', 'RE', 'CH', 'JD'] as $code)
                                                <option value="{{ $code }}" {{ old('doc_type_code') == $code ? 'selected' : '' }}>
                                                    {{ __('documentUpload.types.' . $code) }}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    @error('doc_type_code')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <!-- File Input -->
                            <div class="row mb-3">
                                <label for="file"
                                    class="col-md-4 col-form-label text-md-end">{{ __('documentUpload.file_input') }}</label>
                                <div class="col-md-12">
                                    <div class="file-drop-area" id="drop-area">
                                        <span class="label">{{ __('documentUpload.drop_here_or_click') }}</span>
                                        <input type="file" name="file" id="file" required
                                            class="@error('file') is-invalid @enderror">
                                    </div>
                                    @error('file')
                                        <span class="invalid-feedback d-block mt-2"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn theme-btn btn-style-two">
                                        {{ __('documentUpload.submit') }}
                                    </button>
                                </div>
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

        // Also handle manual selection via input
        fileInput.addEventListener('change', e => {
            if (fileInput.files.length > 0) {
                label.textContent = fileInput.files[0].name;
            }
        });
    </script>

@endsection
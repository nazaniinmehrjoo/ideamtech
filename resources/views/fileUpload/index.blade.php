@extends('layouts.app')

@section('content')
    <style>
        .doc-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
        }

        .doc-card {
            background: #fff;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease-in-out;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .doc-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        }

        .doc-icon {
            font-size: 32px;
            color: #6c757d;
            text-align: center;
            margin-bottom: 10px;
        }

        .doc-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
            text-align: center;
        }

        .doc-code {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-bottom: 10px;
        }

        .doc-meta {
            font-size: 12px;
            color: #555;
            margin-bottom: 5px;
        }

        .doc-badge {
            font-size: 11px;
            font-weight: bold;
            padding: 4px 10px;
            border-radius: 4px;
            display: inline-block;
            margin-top: 8px;
            align-self: flex-start;
        }

        .badge-PS,
        .badge-PR,
        .badge-IN,
        .badge-FR {
            background-color: #0d6efd;
            color: white;
        }

        .badge-ST,
        .badge-RE,
        .badge-CH,
        .badge-JD {
            background-color: #ffc107;
            color: black;
        }

        .badge-default {
            background-color: #6c757d;
            color: white;
        }
    </style>

    <div class="container py-5">
        <h2 class="mb-4 text-center">{{ __('documents.title') }}</h2>

        {{-- Filter Form --}}
        <form method="GET" action="{{ route('documents.index', ['locale' => app()->getLocale()]) }}" class="mb-5">
            <div class="row g-3 align-items-end">

                <div class="col-md-2">
                    <label class="form-label">{{ __('documents.type') }}</label>
                    <select name="doc_type_code" class="form-control">
                        <option value="">{{ __('documents.all') ?? 'همه' }}</option>
                        @foreach(__('documentUpload.types') as $code => $label)
                            <option value="{{ $code }}" {{ request('doc_type_code') == $code ? 'selected' : '' }}>{{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">{{ __('documents.owner') }}</label>
                    <select name="owner_code" class="form-control">
                        <option value="">{{ __('documents.all') ?? 'همه' }}</option>
                        @foreach(__('documentUpload.units') as $code => $name)
                            <option value="{{ $code }}" {{ request('owner_code') == $code ? 'selected' : '' }}>{{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">{{ __('documents.revision') }}</label>
                    <input type="number" name="revision_number" class="form-control"
                        value="{{ request('revision_number') }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label">{{ __('documents.code') }}</label>
                    <input type="text" name="code" class="form-control" placeholder="مثال: SYS-PR-001-0"
                        value="{{ request('code') }}">
                </div>

                <div class="col-md-2">
                    <label class="form-label">{{ __('documents.date') }}</label>
                    <input type="date" name="created_at" class="form-control" value="{{ request('created_at') }}">
                </div>

                <div class="col-md-1 d-grid">
                    <button type="submit" class="btn btn-primary">{{ __('documents.filter') }}</button>
                </div>
            </div>
        </form>

        {{-- Document Cards --}}
        <div class="doc-grid">
            @forelse($documents as $group => $versions)
                    <div class="doc-card">
                        @php
                            $latest = $versions->first();
                            $code = strtoupper($latest->doc_type_code);
                            $badgeText = __('documents.labels.' . $code);
                            if ($badgeText === 'documents.labels.' . $code) {
                                $badgeText = __('documents.labels.default');
                            }
                            $badgeClass = array_key_exists($code, __('documents.labels')) ? 'badge-' . $code : 'badge-default';
                            $fileNameBase = "{$latest->owner_code}-{$latest->doc_type_code}-" . str_pad($latest->serial_number, 3, '0', STR_PAD_LEFT);
                            $fullFileName = "{$fileNameBase}-{$latest->revision_number}";
                        @endphp

                        <div>
                            <div class="doc-icon">📄</div>

                            {{-- عنوان، کد و اطلاعات اصلی آخرین نسخه --}}
                            <div class="doc-title">{{ $badgeText }}</div>
                            <div class="doc-code">{{ $fullFileName }}</div>

                            <div class="doc-meta"><strong>{{ __('documents.date') }}:</strong>
                                {{ $latest->created_at->format('Y-m-d') }}</div>
                            <div class="doc-meta"><strong>{{ __('documents.revision') }}:</strong> {{ $latest->revision_number }}
                            </div>
                            <div class="doc-meta"><strong>{{ __('documents.owner') }}:</strong> {{ $latest->owner_code }}</div>

                            <span class="doc-badge {{ $badgeClass }}">{{ $badgeText }}</span>

                            {{-- دکمه دانلود آخرین نسخه --}}
                            <a href="{{ asset('storage/' . $latest->file_path) }}" class="btn btn-sm btn-outline-primary mt-3 w-100"
                                target="_blank">
                                {{ __('documents.download') }}
                            </a>

                            {{-- دکمه ویرایش / افزودن نسخه جدید --}}
                            @auth
                                <a href="{{ route('documents.edit', ['locale' => app()->getLocale(), 'id' => $latest->id]) }}"
                                    class="btn btn-sm btn-warning mt-2 w-100">
                                    ✏️ {{ __('documents.edit_version') ?? 'افزودن نسخه جدید' }}
                                </a>
                            @endauth

                            {{-- لیست نسخه‌ها --}}
                            @if($versions->count() > 1)
                                <hr>
                                <strong class="small d-block mb-1">{{ __('documents.revision') }}‌های قبلی:</strong>
                                <ul class="list-unstyled small mt-1">
                                    @foreach($versions as $version)
                                        <li>
                                            <a href="{{ asset('storage/' . $version->file_path) }}" target="_blank">
                                                📥 {{ __('documents.revision') }} {{ $version->revision_number }}
                                                ({{ $version->created_at->format('Y-m-d') }})
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
            @empty
                <p class="text-center w-100 mt-4">{{ __('documents.not_found') }}</p>
            @endforelse
        </div>

    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4 text-center">{{ __('documents.title') }}</h2>

        <div class="text-end mb-4">
            <a href="{{ route('documents.showForm', ['locale' => app()->getLocale()]) }}" class="btn btn-success">
                +
            </a>
        </div>
        <form method="GET" action="{{ route('documents.index', ['locale' => app()->getLocale()]) }}" class="mb-5" dir="rtl">
            <div class="card filter-card shadow-sm border-0">
                <div class="card-header">
                    <h5 class="mb-0 text-end">🎯 فیلتر اسناد</h5>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <label for="code" class="form-label text-end d-block">🔎 کد کامل سند</label>
                            <input type="text" name="code" id="code" value="{{ request('code') }}"
                                class="form-control text-end" placeholder="مثال: OWN-DOC-001-0">
                        </div>

                        <div class="col-md-4">
                            <label for="owner_code" class="form-label text-end d-block">👤 کد مالک</label>
                            <input type="text" name="owner_code" id="owner_code" value="{{ request('owner_code') }}"
                                class="form-control text-end" placeholder="مثال: OWN">
                        </div>

                        <div class="col-md-4">
                            <label for="doc_type_code" class="form-label text-end d-block">📄 کد نوع سند</label>
                            <input type="text" name="doc_type_code" id="doc_type_code"
                                value="{{ request('doc_type_code') }}" class="form-control text-end"
                                placeholder="مثال: DOC">
                        </div>

                        <div class="col-md-4">
                            <label for="revision_number" class="form-label text-end d-block">🔢 شماره ویرایش</label>
                            <input type="number" name="revision_number" id="revision_number"
                                value="{{ request('revision_number') }}" class="form-control text-end"
                                placeholder="مثال: 0">
                        </div>

                        <div class="col-md-4">
                            <label for="created_at" class="form-label text-end d-block">🗓️ تاریخ ایجاد</label>
                            <input type="date" name="created_at" id="created_at" value="{{ request('created_at') }}"
                                class="form-control text-end">
                        </div>

                        <div class="col-md-4 d-flex align-items-end">
                            <div class="d-grid gap-2 w-100">
                                <button type="submit" class="btn btn-success">
                                    🔎 اعمال فیلتر
                                </button>
                                <a href="{{ route('documents.index', ['locale' => app()->getLocale()]) }}"
                                    class="btn btn-outline-secondary">
                                    ♻️ ریست فیلتر
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>






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
                            <!-- <div class="doc-title">{{ $badgeText }}</div> -->
                            <div class="doc-code">{{ $fullFileName }}</div>

                            <div class="doc-meta">
                                <strong>{{ __('documents.date') }}:</strong>{{ $latest->created_at->format('Y-m-d') }}
                            </div>
                            <div class="doc-meta"><strong>{{ __('documents.revision') }}:</strong> {{ $latest->revision_number }}
                            </div>
                            <div class="doc-meta"><strong>{{ __('documents.owner') }}:</strong> {{ $latest->owner_code }}</div>

                            <span class="doc-badge {{ $badgeClass }}">{{ $badgeText }}</span>

                            <a href="{{ asset('storage/' . $latest->file_path) }}" class="btn btn-sm btn-outline-primary mt-3 w-100"
                                target="_blank">
                                {{ __('documents.download') }}
                            </a>

                            <a href="{{ route('documents.edit', ['locale' => app()->getLocale(), 'id' => $latest->id]) }}"
                                class="btn btn-sm btn-warning mt-2 w-100">
                                ✏️ {{ __('documents.edit_version') ?? 'افزودن نسخه جدید' }}
                            </a>

                            <!-- <form action="{{ route('documents.destroy', ['locale' => app()->getLocale(), 'id' => $latest->id]) }}"
                                                                                                        method="POST" class="mt-2">
                                                                                                        @csrf
                                                                                                        @method('DELETE')
                                                                                                        <button type="submit" class="btn btn-sm btn-danger w-100">
                                                                                                            🗑️ {{ __('documents.delete') }}
                                                                                                        </button>
                                                                                                    </form> -->

                            <button class="btn btn-sm btn-outline-info mt-3 w-100"
                                onclick="trackAndOpenModal('{{ $latest->id }}', '{{ $badgeText }} - {{ $fullFileName }}', {{ json_encode($versions) }})">
                                {{ __('documents.view_all_versions') ?? 'مشاهده تمامی نسخه‌ها' }}
                            </button>
                        </div>
                    </div>
            @empty
                <p class="text-center w-100 mt-4">{{ __('documents.not_found') }}</p>
            @endforelse
        </div>
    </div>

    <div id="moreProductDtl" class="modal">
        <div class="modal-content">
            <span class="closeModal" onclick="closeModal()">
                <img src="/assets/images/icons/close-icon.png" alt="Close Icon">
            </span>
            <h3 id="productNameModal" class="text-light"></h3>
            <p id="productDescriptionModal" class="text-light"></p>

            <ul id="versionList" class="list-unstyled text-light">
            </ul>
        </div>
    </div>

    <script>
        function trackAndOpenModal(productId, productName, versions) {
            document.getElementById('productNameModal').textContent = productName;
            document.getElementById('productDescriptionModal').textContent = "All versions:";
            const versionList = document.getElementById('versionList');
            versionList.innerHTML = '';

            versions.forEach(version => {
                const formattedDate = new Date(version.created_at).toISOString().split('T')[0];

                const fileName = version.file_path.split('/').pop();


                const listItem = document.createElement('li');
                listItem.innerHTML = `<h5 href="${version.file_path}" target="_blank">
                                                            📥 شماره ویرایش ${version.revision_number} - ${fileName} (${formattedDate})
                                                          </h5>
                                                          <a href="{{ asset('storage/${version.file_path}') }}" class="compare-button" style="padding:1px 2px;border-radius:14px" download>
                                                            Download Version ${version.revision_number}
                                                          </a>`;
                versionList.appendChild(listItem);
            });
            document.getElementById('moreProductDtl').style.display = 'block';
        }

    </script>


@endsection
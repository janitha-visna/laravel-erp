@extends('layouts.app')

@section('title', 'Add Item')

@section('content')

    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('items.index') }}">Items</a></li>
            <li class="breadcrumb-item active">Add Item</li>
        </ol>
    </nav>

    <div class="card shadow-sm border-0 mx-auto" style="max-width: 760px;">
        <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
            <h5 class="mb-0 fw-bold">Add New <span class="text-info">Item</span></h5>
        </div>
        <div class="card-body">

            {{-- Validation error summary --}}
            @if ($errors->any())
                <div class="alert alert-danger d-flex align-items-center gap-2" role="alert">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <span>Please fix the errors below before saving.</span>
                </div>
            @endif

            <form method="POST" action="{{ route('items.store') }}" novalidate>
                @csrf

                <div class="row g-3">

                    {{-- Item Code --}}
                    <div class="col-12 col-sm-6">
                        <label for="item_code" class="form-label fw-semibold">
                            Item Code <span class="text-danger">*</span>
                        </label>
                        <input type="text" id="item_code" name="item_code"
                               class="form-control @error('item_code') is-invalid @enderror"
                               value="{{ old('item_code') }}"
                               placeholder="e.g. ITM-006" required>
                        @error('item_code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Item Name --}}
                    <div class="col-12 col-sm-6">
                        <label for="item_name" class="form-label fw-semibold">
                            Item Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" id="item_name" name="item_name"
                               class="form-control @error('item_name') is-invalid @enderror"
                               value="{{ old('item_name') }}"
                               placeholder="e.g. Samsung Galaxy A55" required>
                        @error('item_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Category --}}
                    <div class="col-12 col-sm-6">
                        <label for="category_id" class="form-label fw-semibold">
                            Category <span class="text-danger">*</span>
                        </label>
                        <select id="category_id" name="category_id"
                                class="form-select @error('category_id') is-invalid @enderror" required>
                            <option value="">— Select Category —</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Sub Category --}}
                    <div class="col-12 col-sm-6">
                        <label for="sub_category_id" class="form-label fw-semibold">
                            Sub Category <span class="text-danger">*</span>
                        </label>
                        <select id="sub_category_id" name="sub_category_id"
                                class="form-select @error('sub_category_id') is-invalid @enderror"
                                disabled required>
                            <option value="">— Select Category first —</option>
                        </select>
                        {{-- Preserve old sub_category_id across validation failures --}}
                        <input type="hidden" id="pre_sub" value="{{ old('sub_category_id') }}">
                        @error('sub_category_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Quantity --}}
                    <div class="col-12 col-sm-6">
                        <label for="quantity" class="form-label fw-semibold">
                            Quantity <span class="text-danger">*</span>
                        </label>
                        <input type="number" id="quantity" name="quantity" min="0"
                               class="form-control @error('quantity') is-invalid @enderror"
                               value="{{ old('quantity', 0) }}"
                               placeholder="0" required>
                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Unit Price --}}
                    <div class="col-12 col-sm-6">
                        <label for="unit_price" class="form-label fw-semibold">
                            Unit Price (Rs) <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">Rs</span>
                            <input type="number" id="unit_price" name="unit_price"
                                   min="0.01" step="0.01"
                                   class="form-control @error('unit_price') is-invalid @enderror"
                                   value="{{ old('unit_price') }}"
                                   placeholder="0.00" required>
                            @error('unit_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>{{-- /row --}}

                <hr class="my-4">

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-info text-white">
                        <i class="bi bi-check-lg"></i> Save Item
                    </button>
                    <a href="{{ route('items.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-lg"></i> Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    const ajaxUrl = "{{ route('items.subcategories') }}";
    const preSub  = document.getElementById('pre_sub').value;

    function loadSubCategories(categoryId, preSelected) {
        const select = document.getElementById('sub_category_id');
        select.disabled = true;
        select.innerHTML = '<option>Loading…</option>';

        if (!categoryId) {
            select.innerHTML = '<option value="">— Select Category first —</option>';
            return;
        }

        fetch(`${ajaxUrl}?category_id=${categoryId}`)
            .then(r => r.json())
            .then(data => {
                select.innerHTML = '<option value="">— Select Sub Category —</option>';
                data.forEach(sub => {
                    const opt = document.createElement('option');
                    opt.value = sub.id;
                    opt.textContent = sub.name;
                    if (String(sub.id) === String(preSelected)) opt.selected = true;
                    select.appendChild(opt);
                });
                select.disabled = false;
            });
    }

    const catSelect = document.getElementById('category_id');

    // On page load — if category is pre-selected (after validation failure), load its subs
    if (catSelect.value) {
        loadSubCategories(catSelect.value, preSub);
    }

    // On category change
    catSelect.addEventListener('change', () => {
        loadSubCategories(catSelect.value, '');
    });
</script>
@endpush

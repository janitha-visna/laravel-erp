@extends('layouts.app')

@section('title', 'Items')

@section('content')

    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Items</li>
        </ol>
    </nav>

    {{-- Flash Messages --}}
    @if (session('created'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('created') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if (session('updated'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('updated') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if (session('deleted'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-trash-fill me-2"></i> {{ session('deleted') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Card --}}
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white d-flex align-items-center justify-content-between py-3">
            <h5 class="mb-0 fw-bold">Item <span class="text-info">List</span></h5>
            <a href="{{ route('items.create') }}" class="btn btn-sm btn-info text-white">
                <i class="bi bi-plus-lg"></i> Add Item
            </a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Item Code</th>
                            <th>Item Name</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Qty</th>
                            <th>Unit Price (Rs)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <span class="badge bg-warning text-dark">{{ $item->item_code }}</span>
                                </td>
                                <td>{{ $item->item_name }}</td>
                                <td>{{ $item->category->name ?? 'N/A' }}</td>
                                <td>{{ $item->subCategory->name ?? 'N/A' }}</td>
                                <td>{{ number_format($item->quantity) }}</td>
                                <td><strong>{{ number_format($item->unit_price, 2) }}</strong></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('items.edit', $item) }}"
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-pencil-fill"></i> Edit
                                        </a>
                                        <form action="{{ route('items.destroy', $item) }}" method="POST"
                                              onsubmit="return confirm('Delete this item? This cannot be undone.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash-fill"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    No items found.
                                    <a href="{{ route('items.create') }}">Add one</a>.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($items->hasPages())
                <div class="d-flex justify-content-end p-3">
                    {{ $items->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>

@endsection

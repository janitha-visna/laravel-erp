@extends('layouts.app')

@section('title', 'Items')

@section('content')
    <div class="erp-breadcrumb">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <span class="sep">/</span>
        <span class="current">Items</span>
    </div>

    {{-- Flash Messages --}}
    @if (session('created'))
        <div class="erp-alert success" data-auto-dismiss>
            <i class="bi bi-check-circle-fill"></i> {{ session('created') }}
        </div>
    @endif

    @if (session('updated'))
        <div class="erp-alert success" data-auto-dismiss>
            <i class="bi bi-check-circle-fill"></i> {{ session('updated') }}
        </div>
    @endif

    @if (session('deleted'))
        <div class="erp-alert error" data-auto-dismiss>
            <i class="bi bi-trash-fill"></i> {{ session('deleted') }}
        </div>
    @endif

    <div class="erp-card">
        <div class="section-header">
            <div class="section-title">Item <span>List</span></div>
            <a href="{{ route('items.create') }}" class="btn-erp-primary">
                <i class="bi bi-plus-lg"></i> Add Item
            </a>
        </div>

        <div class="table-responsive">
            <table class="erp-table erp-datatable">
                <thead>
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
                    @forelse ($items as $i => $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><span class="badge-erp amber">{{ $item->item_code }}</span></td>
                            <td>{{ $item->item_name }}</td>
                            <td>{{ $item->category->name ?? 'N/A' }}</td>
                            <td>{{ $item->subCategory->name ?? 'N/A' }}</td>
                            <td>{{ number_format($item->quantity) }}</td>
                            <td><strong>{{ number_format($item->unit_price, 2) }}</strong></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('items.edit', $item) }}" class="btn-erp-edit">
                                        <i class="bi bi-pencil-fill"></i> Edit
                                    </a>

                                    {{-- In Laravel, DELETE actions must use POST/DELETE with CSRF protection --}}
                                    <form action="{{ route('items.destroy', $item) }}" method="POST"
                                        onsubmit="return confirm('Delete this item? This cannot be undone.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-erp-danger">
                                            <i class="bi bi-trash-fill"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center" style="color:var(--slate-600);padding:30px">
                                No items found. <a href="{{ route('items.create') }}" style="color:var(--teal)">Add
                                    one</a>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

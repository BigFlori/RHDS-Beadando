@extends('layouts.app')

@section('title')
Kölcsönzések
@endsection

@section('content')
    <div class="container">
        <h1>Loans</h1>
        <a href="{{ route('loans.create') }}" class="btn btn-primary">Create Loan</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    @foreach (['id', 'member_id', 'inventory_id', 'borrow_date', 'return_date'] as $column)
                        <th>
                            <a class="d-flex gap-1 text-decoration-none text-dark justify-content-center align-items-center"
                                href="{{ route('loans.index', ['sort' => $column, 'direction' => $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                                {{ ucfirst(str_replace('_', ' ', $column)) }}
                                @if ($sortColumn === $column)
                                    @if ($sortDirection === 'asc')
                                        <i class="fa-solid fa-arrow-down"></i>
                                    @else
                                        <i class="fa-solid fa-arrow-up"></i>
                                    @endif
                                @endif
                            </a>
                        </th>
                    @endforeach
                    <th>Returned</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $loan)
                    @php
                        $returnDate = $loan->return_date ? Carbon\Carbon::parse($loan->return_date) : null;
                        $isOverdue = $returnDate && $returnDate->addDays(3)->isPast();
                    @endphp
                    <tr class="{{ $isOverdue ? 'bg-light-red' : '' }}">
                        <td>{{ $loan->id }}</td>
                        <td>{{ $loan->member->name }}</td>
                        <td>{{ $loan->inventory->book->title }}</td>
                        <td>{{ $loan->borrow_date }}</td>
                        <td>{{ $loan->return_date ?? 'N/A' }}</td>
                        <td>
                            <button class="btn btn-success btn-sm"
                                onclick="confirmReturn({{ $loan->id }})">Returned</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $loans->appends(request()->except('page'))->links() }}
        </div>
    </div>

    <form id="return-form" action="" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endsection

@section('scripts')
    <script>
        function confirmReturn(loanId) {
            if (confirm('Was the book really returned?')) {
                var form = document.getElementById('return-form');
                form.action = '/loans/' + loanId;
                form.submit();
            }
        }
    </script>
@endsection

@extends('layouts.app')

@section('title')
    Kölcsönzések
@endsection

@section('content')
    <div class="container">
        <h1>Kölcsönzések</h1>
        <a href="{{ route('loans.create') }}" class="btn btn-primary">Kölcsönzés létrehozása</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    @php
                        $columnNames = [
                            'id' => '#',
                            'member_id' => 'Tag neve',
                            'inventory_id' => 'Könyv címe',
                            'borrow_date' => 'Kölcsönzés dátuma',
                            'return_date' => 'Visszahozatal dátuma',
                        ];
                    @endphp
                    @foreach ($columnNames as $column => $name)
                        <th>
                            <a class="d-flex gap-1 text-decoration-none text-dark justify-content-center align-items-center"
                                href="{{ route('loans.index', ['sort' => $column, 'direction' => $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                                {{ $name }}
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
                    <th>Visszahozatal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $loan)
                    @php
                        $returnDate = $loan->return_date ? Carbon\Carbon::parse($loan->return_date) : null;
                        $isOverdue = $returnDate && $returnDate->isPast();
                    @endphp
                    <tr>
                        <td>{{ $loan->id }}</td>
                        <td>{{ $loan->member->name }}</td>
                        <td>{{ $loan->inventory->book->title }}</td>
                        <td>{{ $loan->borrow_date }}</td>
                        <td class="{{ $isOverdue ? 'fw-bold' : '' }}" style="color: {{ $isOverdue ? 'red' : '' }};">
                            {{ $loan->return_date ?? 'N/A' }}</td>
                        <td>
                            <button class="btn btn-success btn-sm"
                                onclick="confirmReturn({{ $loan->id }})">Visszavétel</button>
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
            if (confirm('Biztosan visszahozták a könyvet?')) {
                var form = document.getElementById('return-form');
                form.action = '/loans/' + loanId;
                form.submit();
            }
        }
    </script>
@endsection

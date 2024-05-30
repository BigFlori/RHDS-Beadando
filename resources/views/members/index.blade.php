{{-- <!-- resources/views/members/index.blade.php --> --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tagok</h1>
        <a href="{{ route('members.create') }}" class="btn btn-primary">Új tag felvétele</a>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    @php
                        $columnNames = [
                            'name' => 'Név',
                            'email' => 'Email',
                            'member_type_id' => 'Tag típusa',
                            'created_at' => 'Létrehozás dátuma',
                        ];
                    @endphp
                    @foreach ($columnNames as $column => $name)
                        <th>
                            <a class="d-flex gap-1 text-decoration-none text-dark justify-content-center align-items-center"
                                href="{{ route('members.index', ['sort' => $column, 'direction' => $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
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
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ optional($member->memberType)->type_name ?? 'N/A' }}</td>
                        <td>{{ $member->created_at->format('Y. m. d. H:i') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('members.edit', $member->id) }}"
                                    class="btn btn-warning btn-sm">Szerkesztés</a>
                                <form action="{{ route('members.destroy', $member->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Törlés</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $members->appends(request()->except('page'))->links() }}
        </div>
    </div>
@endsection

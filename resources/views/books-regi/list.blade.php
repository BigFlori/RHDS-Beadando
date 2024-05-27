@extends('layouts.app')

@section('title')
Könyvek
@endsection

@section('content')
<div class="container-lg mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="text-center">Könyvek</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ISBN</th>
                        <th>Cím</th>
                        <th>Szerző</th>
                        <th>Kiadó</th>
                        <th>Kiadás éve</th>
                        <th>Kiadás</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>978-3-16-148410-0</td>
                        <td>Harry Potter és a bölcsek köve</td>
                        <td>J. K. Rowling</td>
                        <td>Animus</td>
                        <td>1997</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>978-3-16-148410-1</td>
                        <td>Harry Potter és a titkok kamrája</td>
                        <td>J. K. Rowling</td>
                        <td>Animus</td>
                        <td>1998</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>978-3-16-148410-2</td>
                        <td>Harry Potter és az azkabani fogoly</td>
                        <td>J. K. Rowling</td>
                        <td>Animus</td>
                        <td>1999</td>
                        <td>1</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
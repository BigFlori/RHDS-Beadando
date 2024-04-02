@extends('layouts.app')

@section('title')
Tagok
@endsection

@section('content')
<div class="container-lg mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="text-center">Tagok</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Típus</th>
                        <th>Név</th>
                        <th>Email</th>
                        <th>Telefonszám</th>
                        <th>Irányítószám</th>
                        <th>Város</th>
                        <th>Cím</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Tanuló</td>
                        <td>Harry Potter</td>
                        <td>potter@gmail.com</td>
                        <td>+36308976789</td>
                        <td>9700</td>
                        <td>Szombathely</td>
                        <td>Nagy utca 2</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Oktató</td>
                        <td>Kis István</td>
                        <td>istvanka@gmail.com</td>
                        <td>+36308976789</td>
                        <td>9700</td>
                        <td>Szombathely</td>
                        <td>Kis utca 1</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Külsös diák</td>
                        <td>Nagy István</td>
                        <td>istipisti@gmail.com</td>
                        <td>+36308976789</td>
                        <td>9700</td>
                        <td>Szombathely</td>
                        <td>Nagy utca 1</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
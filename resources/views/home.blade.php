@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center text-lg-center">قائمة رواتب الموظفين</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(auth()->user()->is_admin)
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Employee No</th>
                                        <th scope="col">Master Card Id</th>
                                        <th scope="col">Net Salary <br><smal style="font-size: x-small; color : darkred; text-align: center">بآلاف الدنانير العراقي</smal></th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($elements as $element)
                                    <tr>
                                        <th scope="row">{{ $element->id }}</th>
                                        <td>{{ $element->name }}</td>
                                        <td>{{ $element->employee_no }}</td>
                                        <td>{{ $element->card_id }}</td>
                                        <td>{{ number_format($element->netSalary) }}</td>
                                        <td><a href="{{ route('user.edit', $element->id) }}" class="btn btn-outline-dark btn-sm">Edit</a></td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            <div class="pull-right">
                                {{ $elements->render('pagination::bootstrap-4') }}
                            </div>

                        @else
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Employee No</th>
                                        <th scope="col">Master Card Id</th>
                                        <th scope="col">Net Salary <br><smal style="font-size: x-small; color : darkred; text-align: center">بآلاف الدنانير العراقي</smal></th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{ $user->id }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->employee_no }}</td>
                                            <td>{{ $user->card_id }}</td>
                                            <td>{{ number_format($user->netSalary) }}</td>
                                            <td><a href="#" class="disabled btn btn-outline-dark btn-sm">Edit</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

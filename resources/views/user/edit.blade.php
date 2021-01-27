@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="d-flex flex-column" style="width: 100rem">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <form class="horizontal-form " role="form" method="POST"
                              action="{{ route('user.update', $element->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control col-12"
                                       value="{{ $element->name }}"
                                       placeholder="{{ $element->name }}" required>
                                <small id="emailHelp" class="form-text text-muted">name</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Employee No</label>
                                <input type="text" name="employee_no" class="form-control col-12"
                                       value="{{ $element->employee_no }}"
                                       placeholder="{{ $element->employee_no }}" required>
                                <small id="emailHelp" class="form-text text-muted">Employee No</small>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-danger">Loan (استقطاعات)</label>
                                        <input type="text" name="loan" class="form-control col-12"
                                               value="{{ $element->salaries->first()->employee_intervention->loan }}"
                                               placeholder="{{ $element->salaries->first()->employee_intervention->loan }}" required>
                                        <small id="emailHelp" class="form-text text-danger">قيمة السلفة المتبقية</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-danger">Taxes (استقطاعات)</label>
                                        <input type="text" name="taxes" class="form-control col-12"
                                               value="{{ $element->salaries->first()->employee_intervention->taxes }}"
                                               placeholder="{{ $element->salaries->first()->employee_intervention->taxes }}" required>
                                        <small id="emailHelp" class="form-text text-danger">قيمة الضريبة (استقطاع)</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Certificate Allowance (نسبة)</label>
                                        <select class="form-control form-select form-select-sm"
                                                aria-label=".form-select-sm example" name="certificate_id">
                                            @foreach($certificates as $c)
                                                <option value="{{ $c->id }}" {{ $c->id == $element->certificate_id ? 'selected' : '' }}>{{ $c->title }} -  % {{ $c->percentage }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Position Allowance (نسبة)</label>
                                        <select class="form-control form-select form-select-sm"
                                                aria-label=".form-select-sm example" name="position_id">
                                            @foreach($positions as $c)
                                                <option value="{{ $c->id }}" {{ $c->id == $element->position_id ? 'selected' : '' }}>{{ $c->title }} -  % {{ $c->percentage }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Social Status Allowance (قيمة)</label>
                                        <select class="form-control form-select form-select-sm"
                                                aria-label=".form-select-sm example" name="social_status_id">
                                            @foreach($socialStatus as $c)
                                                <option value="{{ $c->id }}" {{ $c->id == $element->social_status_id ? 'selected' : '' }}>{{ $c->title }} -  {{ $c->value }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Children Allowance (قيمة)</label>
                                        <select class="form-control form-select form-select-sm"
                                                aria-label=".form-select-sm example" name="children_id">
                                            @foreach($children as $c)
                                                <option value="{{ $c->id }}" {{ $c->id == $element->children_id ? 'selected' : '' }}>{{ $c->title }} -  {{ $c->value }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Transportation Allowance (قيمة)</label>
                                        <select class="form-control form-select form-select-sm"
                                                aria-label=".form-select-sm example" name="transportation_id">
                                            @foreach($transportations as $c)
                                                <option value="{{ $c->id }}" {{ $c->id == $element->transportation_id ? 'selected' : '' }}>{{ $c->title }} -  {{ $c->value }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title Allowance (نسبة)</label>
                                        <select class="form-control form-select form-select-sm"
                                                aria-label=".form-select-sm example" name="title_id">
                                            @foreach($titles as $c)
                                                <option value="{{ $c->id }}" {{ $c->id == $element->title_id ? 'selected' : '' }}>{{ $c->title }} - % {{ $c->percentage }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>


                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-danger">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

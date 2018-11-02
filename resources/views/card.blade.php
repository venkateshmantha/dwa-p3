@extends('master')

@section('content')
    <div class='container'>
        <div class='row mt-4'>
            <div class='col-md-8 col-centered'>
                <div class='card'>
                    <h2 class='col-centered'>Length Converter</h2>
                </div>
            </div>
        </div>
        <div class='row mt-2'>
            <div class='col-md-8 col-centered'>
                <div class='card'>
                    <div class='card-body'>
                        <form method='POST' action='/process'>
                            {{ csrf_field() }}
                            <div class='form-row mt-2'>
                                <div class='col'>
                                    <label>From</label>
                                    <select name='from' class='form-control'>
                                        @foreach ($units as $unit)
                                            <option @if (isset($from) && $from == $unit) {{'selected'}} @endif >{{$unit}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class='col'>
                                    <label>To</label>
                                    <select name='to' class='form-control'>
                                        @foreach ($units as $unit)
                                            <option @if (isset($to) && $to == $unit) {{'selected'}} @endif >{{$unit}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label class='mt-4' for="value">Value to convert</label>
                            <input class='form-control mt-2'
                                   type='text'
                                   name='value'
                                   id='value'
                                   value='{{ $val ?? ''}}'
                                   placeholder='Value to convert'>
                            <label class='mt-4' for="roundup">RoundUp</label>
                            <input type='checkbox'
                                   name='roundUp'
                                   id='roundup'
                            @if ($roundUp == 'on') {{'checked'}} @endif ><br>
                            <button type='submit' class='btn btn-light mt-4'>Convert</button>
                            <button name='clear' class='btn btn-dark mt-4'>Clear</button>
                        </form>
                        @if(count($errors) > 0)
                            <div class='errors alert alert-danger mt-4'>
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        @if($alert == 1)
                            <div class='alert alert-success mt-4' role='alert'>
                                {{'Result: ' . $val . ' ' . $from . ' = ' .
                                    $res . ' ' . $to }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
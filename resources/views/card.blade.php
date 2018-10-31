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
                                        <?php foreach ($units as $unit): ?>
                                        <option <?php if (isset($from) && $from == $unit) echo 'selected' ?>><?= $unit ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class='col'>
                                    <label>To</label>
                                    <select name='to' class='form-control'>
                                        <?php foreach ($units as $unit): ?>
                                        <option <?php if (isset($to) && $to == $unit) echo 'selected' ?>><?= $unit ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <input class='form-control mt-4'
                                   type='text'
                                   name='value'
                                   value='<?php echo (isset($val)) ? $val : '' ?>'
                                   placeholder='Value to convert'>
                            <label><input class='mt-4' type='checkbox'
                                          name='roundUp' <?php if ($roundUp == 'on') echo 'checked' ?> > Round up</label><br>
                            <button type='submit' class='btn btn-light mt-4'>Convert</button>
                            <button name='clear' class='btn btn-dark mt-4'>Clear</button>
                        </form>
                        <?php if ($hasErrors): ?>
                        <div class='errors alert alert-danger mt-4'>
                            <?php foreach ($errors as $error): ?>
                                <?= $error ?>
                            <?php endforeach; ?>
                        </div>
                        <?php endif ?>
                        <?php if (!$hasErrors && $alert == 1): ?>
                        <div class='alert alert-success mt-4' role='alert'>
                            <?php echo 'Result: ' . $val . ' ' . $from . ' = ' .
                                $result . ' ' . $to ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
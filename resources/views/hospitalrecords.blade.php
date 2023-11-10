@extends('layouts.app')

@section('contents')



    <table class="table table-hover">
    <thead class="table-primary">
            <th>#</th>
            <th>Name</th>
            <th>Heart Rate</th>
            <th>Respiratory</th>
            <th>Blood Pressure</th>
            <th>Temperature</th>
            <th>Spo2</th>
            <th>Date</th>
            <th>Time</th>
            <th>Action</th>
        </thead>
        <tbody>
                <td class="align-middle">#</td>
                <td class="align-middle">name</td>
                <td class="align-middle">heart_rate</td>
                <td class="align-middle">respiratory_rate</td>
                <td class="align-middle">blood_pressure</td>
                <td class="align-middle">temperature</td>
                <td class="align-middle">spo2</td>
                <td class="align-middle">date</td>
                <td class="align-middle">time</td>
                <td class="align-middle">
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="" type="button" class="btn btn-secondary">Detail</a>
                    </div>
                   </td>
            </thead>
        </tbody>
    </table>



@endsection
@extends('layouts.app')

@section('title', 'Patient Data Information')

@section('contents')

{{-- <div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Patient Information</h1>
    <a href="{{ route('patients.create') }}" class="btn btn-primary">Add Info</a>
</div> --}}
<hr />
@if(Session::has('success'))
<div class="alert alert-success" roles="alert">
    {{ Session::get('success') }}
</div>
@endif

{{-- <h2>Search Customer Total Data : <span id="total_records"></span></h2> --}}

{{-- <div class="row">
    <h2>Search Customer Total Data : <span id="total_records"></span></h2>
    <div class="col-12">
        <div class="form-group">
            <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
        </div> --}}
        
        <h2>Search for Patient Total Data : <span id="total_records"></span></h2>
        <div class="col-12">
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" >
            {{ csrf_field() }}
            <div class="input-group">
              <input type="text" name="search" id="search" class="form-control bg-light border-0 small" type="search" placeholder="Search for patient data" >
              <div class="input-group-append">
                {{-- <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i> --}}
                </button>
              </div>
            </div>
          </form>
<br>
<table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Condition</th>
            <th>Heart Rate</th>
            <th>Respiratory Rate</th>
            <th>Blood Pressure</th>
            <th>Temperature</th>
            <th>Action</th>
        </thead>
        <tbody>+
            @if($patient->count() > 0)
                @foreach($patient as $rs)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $rs-> name }}</td>
                    <td class="align-middle">{{ $rs-> age }}</td>
                    <td class="align-middle">{{ $rs-> gender }}</td>
                    <td class="align-middle">{{ $rs-> condition }}</td>
                    <td class="align-middle">{{ $rs-> heart_rate }}</td>
                    <td class="align-middle">{{ $rs-> respiratory_pressure }}</td>
                    <td class="align-middle">{{ $rs-> blood_pressure }}</td>
                    <td class="align-middle">{{ $rs-> temperature }}</td>
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('patients.show', $rs->id )}}" type="button" class="btn btn-secondary">Detail</a>
                            <a href="{{ route('patients.edit', $rs->id )}}" type="button" class="btn btn-warning">Edit</a>
                            <form action="" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                            <button class="btn btn-danger m-0">Delete</button>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td class="text-center" colspan="9">Data not Found</td>
                </tr>
                @endif
        </tbody>
</table>

{{-- <script type="text/javascript">


$(document).ready(function() {

    fetch_patient_data();

    function fetch_patient_data(query = '')
    {
        

        $.ajax({
            url:"{{ route('action') }}",
            method: 'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
             {
                $('tbody').html(data.table_data);
                $('$total_records').text(data.total_data);
             }
        })
        
    }

    $(document).on('keyup', '#search', function() {
         var query = $(this).val();
         fetch_patient_data(query);
    });
   
});


</script> --}}

@endsection
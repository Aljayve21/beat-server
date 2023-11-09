@extends('layouts.app')

@section('title', 'Dashboard - Beep-Server')

@section('contents')



<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Bed Available</h1>
</div>

<div class="row">

  <!-- Role As -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Admin
                      </div>
                        <a class="small text-primary stretched-link" href="#">View Details</a>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                </div>
            </div>
        </div>
    </div>
</div>


  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                          Out of Order</div>
                          <h2>....</h2>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Earnings (Annual) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                          Private 5</div>
                          <h2>....</h2>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                       Semi Private 5</div>
                       <h2></h2>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                </div>
            </div>
        </div>
    </div>
</div>
  

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
          <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                      Ward 3</div>
                      <h2>....</h2>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
              </div>
          </div>
      </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
          <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                      Room 103</div>
                      <h2>....</h2>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
              </div>
          </div>
      </div>
  </div>
</div>





<div class="container">
    
    <br>
    <br>
    
        
    </div>
</div>

<h1 class="text-center">Bed Selection</h1>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


  
  

<body>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link {{ request()->is('tab1') ? 'active' : null }}" href="{{ url('tab1') }}" role="tab" >1st Floor</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link {{ request()->is('tab2') ? 'active' : null }}" href="{{ url('tab2') }}" role="tab">2nd Floor</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane {{ request()->is('tab1') ? 'active' : null }}" id="{{ url('tab1') }}" role="tabpanel">
          <div class="row">
            
           @if(isset($roomData))
            @foreach($roomData as $roomNumber => $roomInfo)
            <div class="col-lg-3 mt-3">
              <div class="card" style="width: 10rem;">
                  <div class="card-body">
                    <h5 class="card-title text-center">BED {{ $roomNumber }}</h5>
                    <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary mx-4" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $roomNumber }}">
                        Select
                          </button>
                         

            
            <div class="modal fade" id="exampleModal{{ $roomNumber }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $roomNumber }}" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title text-center" id="exampleModalLabel{{ $roomNumber }}">Room {{ $roomNumber }}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="col mb-3">
                        <label class="form-label">Patient's Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $roomInfo['patient']->name ?? 'N/A' }}" readonly>
                      </div>
                      

                      @if(!is_null($roomInfo['vitalSigns']))
                      @foreach ($roomInfo['vitalSigns'] as $vitalSign)
                      <div class="col mb-3">
                        <label class="form-label">Condition</label>
                        <input type="text" name="condition" class="form-control" value="{{ $vitalSign->condition ?? 'N/A' }}" readonly>
                      </div>
                      <div class="col mb-3">
                        <label class="form-label">Respiratory Rate</label>
                        <input type="text" name="respiratory_rate" class="form-control" value="{{ $vitalSign->respiratory_rate ?? 'N/A' }}" readonly>
                      </div>
                      <div class="col mb-3">
                        <label class="form-label">Temperature</label>
                        <input type="text" name="temperature" class="form-control" value="{{ $vitalSign->temperature ?? 'N/A' }}" readonly>
                      </div>
                      <div class="col mb-3">
                        <label class="form-label">Spo2</label>
                        <input type="text" name="spo2" class="form-control" value="{{ $vitalSign->spo2 ?? 'N/A' }}" readonly>
                      </div>
                      <div class="col mb-3">
                        <label class="form-label">Pulse Rate</label>
                        <input type="text" name="pulse_rate" class="form-control" value="{{ $vitalSign->pulse_rate ?? 'N/A' }}" readonly>
                      </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-danger">Discharged</button>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              @endif
            
        
      </div>

      
      </div>
      <div class="tab-pane {{ request()->is('tab2') ? 'active' : null }}" id="{{ url('tab2') }}" role="tabpanel">
        ...
        </div>

      </div>
</body>
      
@endsection
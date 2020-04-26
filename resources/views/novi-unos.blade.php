<?php 
    use App\objekat; 
    use App\radnja; 
?>
@extends('layouts.app')

@section('content')
    <div class="container">
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
      <h2>Unesi podatke:</h2><br/>
      <form method="post" action="{{url('datepicker')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">          
          <div class="form-group col-md-3">
            <strong>Datum: </strong>
            <input class="date form-control"  type="text" id="datepicker" name="date">
         </div>
          <div class="form-group col-md-3">
            <label for="Name">Objekat:</label>
            <select name = "objekat" class="form-control">
              @foreach($objekti as $objekat)
                <option value = "{{ $objekat->id }}">
                  {{ $objekat->objekat }}
                </option>
              @endforeach
            </select>
           <!--  <input type="text" class="form-control" name="objekat"> -->
          </div>
          <div class="form-group col-md-3">
            <label for="Name">Vreća komada:</label>
            <input type="text" class="form-control" name="kolicina">
          </div>
          <div class="form-group col-md-3" style="margin-top:25px;">
            <button type="submit" class="btn btn-success" style="width: 100px;">Snimi</button>
          </div>
        </div>
      </form>
    </div>
    <script type="text/javascript">
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
         });
    </script>
@endsection
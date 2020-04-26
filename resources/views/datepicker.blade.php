<!-- datepicker.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pečurka</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
  </head>
  <body>
    <div class="container">
    @if (\Session::has('success'))
      <br>
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     <br/>
     <a href="/home"><h3>Pregled termina</h3></a>
      <h2>Unesi podatke:</h2><br/>
      <form method="post" action="{{url('datepicker')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">          
          <div class="form-group col-md-3">
            <strong>Datum: </strong>
            <input class="date form-control"  type="text" id="datepicker" name="date" required autocomplete="false">
         </div>
          <div class="form-group col-md-3">
            <label for="Name">Objekat:</label>
            <select name = "objekat" class="form-control">
              <option disabled selected>Izaberi objekat</option>
              @foreach($objekti as $objekat)
                <option value = "{{ $objekat->id }}" required>
                  {{ $objekat->objekat }}
                </option>
              @endforeach
            </select>
           <!--  <input type="text" class="form-control" name="objekat"> -->
          </div>
          <div class="form-group col-md-3">
            <label for="Name">Vreća komada:</label>
            <input type="text" class="form-control" name="kolicina" required autocomplete="false">
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
  </body>
</html>
<?php 
    use App\objekat; 
    use App\radnja; 
?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hronologija radova</div>
                <div class="card-body">
                    <div class="container">                                 
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Datum</th>
                                    <th>Objekat</th>
                                    <th>Radnja</th>
                                    <th>Komada</th>
                                </tr>
                            </thead>
                            <tbody>                        
                                @foreach($pregledi as $pregled)
                                    @if(date("Y-m-d") == $pregled->datum)
                                        <tr style="background-color: #33ff33;">
                                    @else
                                        <tr>
                                    @endif
                                        <td>
                                            <a href="#" data-target="#modal" data-toggle="modal" class="btn btn-primary details">
                                                {{ date_format(date_create($pregled->datum), "d.m.Y") }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ objekat::Find($pregled->objekat_id)->objekat}}
                                        </td>
                                        <td>
                                            {{ radnja::Find($pregled->radnja_id)->radnja }}
                                        </td>
                                        <td>
                                            {{ $pregled->kolicina }}
                                        </td>
                                    </tr>
                                @endforeach                          
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Modal -->
    <div class="modal fade" id="modal" role="dialog" aria-labelledby="modalLabel" tabindex="-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Unos novog datuma</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
                <label for="birthday">Novi datum:</label>
                <input type="date" id="birthday" name="birthday" autocomplete="false">
                <input type="submit" value="Submit" class="dugme">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <script>
        $(document).ready(function(){
            $(document).on('click', '.details', function(){
                var id = $(this).attr('id');
            }); 
            $(document).on('click', '.dugme', function(){           
                $.ajax({
                    url:"/update/"+id,
                    method: "POST", 
                    success:function(data)
                    {
                        console.lod(id);
                    }
                });
            });
        });
    </script>
@endsection

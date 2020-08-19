<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

       
    </head>
    <body>
        <div class="row">
           
            <div class="col-md-3"></div>
             <br><br>
                <div class="col-md-6">
                 <br><br>
                  <h1>Tema: <strong>{{$cursoSeleccionado->nombre_curso}}</strong></h1>
                  <h1>Descripcion: <strong>{{$cursoSeleccionado->descripcion_curso}}</strong></h1>
                  <h1>Estado: <strong>
                    @if($cursoSeleccionado->estado_curso=="TRUE")
                    Habilitado
                    @else
                    Deshabilitado
                    @endif
                  </strong></h1>
            </table>
                </div>
        </div>
    </body>
</html>

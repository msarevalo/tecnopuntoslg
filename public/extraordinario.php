<!DOCTYPE html>
<html>
<head>
    <title>Celmedia | ClaroClub</title>
    <meta charset="UTF-8">
    <!-- Estilos -->
    <link href="../css/estilos.css" rel="stylesheet">
    <!--<link href="../css/estilos.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/script.js" type="application/javascript"></script>
</head>
<body>

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-body">

            <form name="form1" id="form1" method="post" action="../back/extraordinario.php" enctype="multipart/form-data">

                <h4 class="text-center">Cargar Multiple Archivos</h4>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Archivos</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
                    </div>
                    <button type="submit" class="btn w-M br-0 stl-3">Cargar</button>
                </div>

            </form>

        </div>
    </div>
</div>
</body>
</html>

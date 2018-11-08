<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IXTUS |MD </title>
    <!-- Bootstrap core CSS -->
    <link href="admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="admin/css/animate.min.css" rel="stylesheet">
    <!-- Custom styling plus plugins -->
    <link href="admin/css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">
    <script src="admin/js/jquery.min.js"></script>
</head>
<body style="background:#F7F7F7;">
    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>
        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                    <form action="{{url('verificar')}}" method="post" >
                      {!!csrf_field()!!}
                        <h1>IXTUS | MD</h1>
                        <div>
                            <input name="usuario" type="text" class="form-control" placeholder="Usuario" required="" />
                        </div>
                        <div>
                            <input type="password" name="pass" class="form-control" placeholder="Contraseña" required="" />
                        </div>
                        <div>
                          <input type="submit" class="btn btn-default submit" name="" value="Iniciar sesión">
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1><i style="font-size: 26px;"></i> Corporación Centro Carismático Minuto de Dios!</h1>
                                <p>©2018 Todos los derechos reservados.</p>
                            </div>
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
        </div>
    </div>

</body>
</html>

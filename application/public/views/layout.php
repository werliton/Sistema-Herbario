<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />

        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
        Remove this if you use the .htaccess -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>index</title>
        <meta name="description" content="" />
        <meta name="author" content="Werliton Programador" />

        <meta name="viewport" content="width=device-width; initial-scale=1.0" />

        <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
        <link href="/web-files/css/regra_index.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div id="area-admin">
            <img src="/web-files/img/logo-index.png" />
            <form name="form-login" action="/layout/logar" method="post">
                <legend>Painel Administrativo</legend>
                <div id="esq-area">
                    <span>Usuário:</span>
                    <span>Senha:</span>
                </div>
                <div id="dir-area">
                    <label><input type="text" name="user" id="user"/></label>	
                    <label><input type="password" name="password" id="password"/></label>	

                    <label><input type="submit" name="btn-logar" class="btn-logar" id="btn-logar" value="Logar"/></label>		
                </div>
            </form>
        </div>
    </body>
</html>

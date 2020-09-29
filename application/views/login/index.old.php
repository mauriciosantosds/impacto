<html>
  <head>
    <meta charset="utf-8" />
    <title>Painel impacto</title>

    <link rel="stylesheet" href="<?=base_url('css/dash/bootstrap.min.css');?>">

    <style>
      .card-login {
        padding-top: 30px;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand mx-auto" href="#">
        Painel <img src="<?=base_url('images/logo-white.png');?>" height="30" class="d-inline-block align-top" alt="">
      </a>
    </nav>

    <div class="container-fluid">    
      <div class="row">
        <div class="col-12">
          <div class="card-login">
            <div class="card">
              <div class="card-header">
                Informe login e senha
              </div>
              <div class="card-body">
                <form action="<?=base_url('login/login');?>" method="post">
                  <div class="form-group">
                    <input name="login" type="text" class="form-control" 
                      placeholder="Login"
                      value="<?php echo set_value('email'); ?>" required>
                  </div>
                  <div class="form-group">
                    <input name="password" type="password" class="form-control" 
                      placeholder="Senha"
                      value="<?php echo set_value('password'); ?>" required>
                  </div>
  
                  <div class="text-danger">
                    <?= validation_errors() ?>
                    <?php 
                      if (isset($_SESSION["msg"])) {
                          echo $_SESSION["msg"];
                      }
                    ?>
                  </div>
  
                  <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>
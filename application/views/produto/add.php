<!DOCTYPE html>
<html>
  <meta charset="UTF-8">
    <head>
      <title>Cadastro Produto</title>
    </head>
    <body>
      <div class="container">
        <div class="row">

        <form class="form-horizontal" action="/axm/produto/add" method="post">
          <fieldset>

          <legend>Cadastro de Produto</legend>

          <!-- Select Basic -->
          <?php echo validation_errors(); ?>
          <div class="form-group">
            <label class="col-md-4 control-label" for="user">Produto</label>
            <div class="col-md-4">
              <input class="form-control" type="text" name="nome" placeholder="Nome"/>
            </div>
          </div>  
            <div align="center">
              <input type="submit" class="btn btn-primary"></input>
            </div>
        </div>
      </div>
        </fieldset>
        </form>

          </div>
        </div>
    </body>
</html>
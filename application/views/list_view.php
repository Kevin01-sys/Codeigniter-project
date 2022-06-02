<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Vue version 2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
    <!-- JavaScript Bundle with Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> -->
    <script src="https://unpkg.com/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-tables-2-premium@2.3.6/dist/vue-tables-2.min.js" integrity="sha256-V7nxQJDft6LBIbUZjfvl09AfcZXkiQkHp7neIrYHSfA=" crossorigin="anonymous"></script>
</head>
<body>
    <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
    <div class="container">
        <h2>Ingresar datos</h2>
        <?php echo form_open('lists/addCommunes'); ?>
            <div class="form-group">
                <label for="region">Region:</label>
                <input type="text" class="form-control" id="region" name="region" placeholder="Ingrese una región" >
            </div>
            <div class="form-group">
                <label for="comuna">Comuna:</label>
                <input type="text" class="form-control" id="comuna" name="comuna" placeholder="Ingrese una comuna" >
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        <?php echo form_close(); ?>
    </div>
    <br>
    <div class="col-md-8 col-md-offset-2">
        <div id="communesServer">
            <v-server-table ref="dt_datos" :columns="dt_datos.columns" :options="dt_datos.options"/>
                <div slot="buttons" slot-scope="props">
                    <div class="col-md-12  m-0 p-0">
                        <!-- <button  type="button" class="btn btn-primary btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">test</button> -->
                        <button @click="delete_row(props)" class="btn btn-block dropdown-item pl-2 pr-2 pt-0 pb-0 text-2" >
                            <i class="fa fa-trash pr-1"></i>
                            Borrar
                        </button>
                    </div>
                </div>
                <div slot="identificadores" slot-scope="props">
                        <div class="col-md-12  m-0 p-0">
                        <small class="sub-td">
                            <strong>Identificador general: </strong>
                            {{ props.row.id }}
                            <br>
                            <strong>Identificador de provincia: </strong>
                            {{ props.row.provincia_id }}
                            <br>
                            <strong>Identificador de region: </strong>
                            {{props.row.region_id}}
                        </small>
                        </div>
                    </div>
                </div>
            </v-server-table>
        </div>
    </div>
    <!-- Vue version 2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <script src="<?php echo base_url(); ?>static/js/vue_2/table_vue2.js" type="module"></script>
</body>
</html>
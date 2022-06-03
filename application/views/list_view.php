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
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"> -->
    <!-- Vue version 2 -->
    <script src="https://unpkg.com/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-tables-2-premium@2.3.6/dist/vue-tables-2.min.js" integrity="sha256-V7nxQJDft6LBIbUZjfvl09AfcZXkiQkHp7neIrYHSfA=" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
        <!-- start: Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Editar registro</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open('lists/updateCommune'); ?>
                            <input type="hidden" class="form-control" id="idEdit" name="idEdit" :value="currentLine.id">
                            <div class="form-group">
                                <label for="region">Region:</label>
                                <input type="text" class="form-control" id="regionEdit" name="regionEdit" :value="currentLine.region" placeholder="Ingrese una región" >
                            </div>
                            <div class="form-group">
                                <label for="comuna">Comuna:</label>
                                <input type="text" class="form-control" id="comunaEdit" name="comunaEdit" :value="currentLine.comuna" placeholder="Ingrese una comuna" >
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: Modal -->
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
                <button type="submit" class="btn btn-primary">Submit</button>
            <?php echo form_close(); ?>
        </div>
        <br>
        <div class="col-md-8 col-md-offset-2">
            <!-- Start: Vue-Table -->
            <div id="communesServer">
                <v-server-table ref="dt_datos" :columns="dt_datos.columns" :options="dt_datos.options"/>
                    <!-- identificadores -->
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
                    <!-- buttons -->
                    <div slot="buttons" slot-scope="props">
                        <div class="col-md-12  m-0 p-0">
                            <!-- <button type="button" class="btn btn-success" data-toggle="modal" @click="update_row(props)" data-target="#myModal">Open Modal</button> -->
                            <button @click="update_row(props)" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-trash pr-1"></i>
                                Actualizar
                            </button>
                            <button @click="delete_row(props)" class="btn btn-danger">
                                <i class="fa fa-trash pr-1"></i>
                                Eliminar
                            </button>
                        </div>
                    </div>
                </v-server-table>
            </div>
            <!-- End: Vue-Table -->
        </div>
    </div>

    <!-- Vue version 2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <script src="<?php echo base_url(); ?>static/js/vue_2/table_vue2.js" type="module"></script>
</body>
</html>
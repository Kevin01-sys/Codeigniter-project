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
    <link rel="shortcut icon" href="#">
    <!-- Vue version 2 -->
    <script src="https://unpkg.com/vue@2"></script>
    <!-- Vue version 3 -->
    <!-- <script src="https://unpkg.com/vue@3"></script> -->
</head>
<body>
    <div id="app">
        <!-- Form -->
        <div>
            <?php echo form_open('users/addUser'); ?>
            <div>
                <div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Run</label>
					<div class="col-sm-8"><input id="run" name="run" type="text" class="form-control" autofocus></div>
				</div>
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombres</label>
					<div class="col-sm-8"><input id="nombre" name="nombre" type="text" class="form-control"  autofocus></div>
				</div>
				<div class="form-group">
					<label for="apellidos" class="col-sm-2 control-label">Hobby</label>
					<div class="col-sm-8"><input id="hobby" name="hobby" type="text" class="form-control" ></div>
				</div>
                <button type="submit">Guardar</button>
            </div>
            <?php echo form_close(); ?>
        </div>
			<!-- Tabla de datos -->
			<div class="row">
				<div class="card col-12">
					<div class="card-header">
						<h4>Tabla de personas</h4>
					</div>
					<div class="card-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Run</th>
									<th scope="col">Nombre</th>
									<th scope="col">Hobby</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Eliminar</th>
								</tr>
							</thead>
							<tbody>
                            	<?php
									foreach ($users as $user) {
										echo '
											<tr>
												<td>'.$user->id.'</td>
												<td>'.$user->run.'</td>
												<td>'.$user->name.'</td>
												<td>'.$user->hobby.'</td>
                                                <td><button type="button" class="btn btn-warning text-white" onclick="llenar_datos('.$user->id.', `'.$user->run.'`, `'.$user->name.'`, `'.$user->hobby.'`)">Editar</button></td>
												<td><a href="'.base_url('index.php/users/deleteUser/'.$user->id).'" type="button" class="btn btn-danger">Eliminar</a></td>
											</tr>
										';
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
        <div>
            <button id="idGetData" name="nameGetData" @click="post_json_data">{{ name }}</button>
            <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
            <ul id="example-1">
                <li v-for="item in data">
                    {{ data }}
                </li>
            </ul>
        </div>
    </div>
    <!-- file on which JavaScript tests will be performed -->
    <!-- Vue version 2 -->
    <script src="<?php echo base_url(); ?>static/js/vue_2/fetch_vue2.js" type="module"></script>
    <!-- Vue version 3 -->
    <!-- <script src="static/js/vue_3/fetch_vue3.js" type="module"></script> -->
</body>
</html>
<link rel="shortcut icon" href="/bootstrap/img/Img5.jpg" width="120px" height="120px">	<!--aqui va el codigo del icono de la imagen que se visualizara en el buscador solo hacer la imagen 120x120 y guardarla en public-->
<center><img src="/bootstrap/img/Img5.jpg" img-responsive width="1348" height="300"></center>
<?php $__env->startSection("cabecerausuario"); ?>

<link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/bootstrap.css')); ?>">



<?php $__env->startSection("contenidousuario"); ?>
<table><tr><td width="1000px"></td><td><form><?php echo $__env->make('obracivil.buscarobra', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?></form></td></tr></table>
<center><h2>CONSULTA DE OBRA CIVIL</h2></center>

<?php if(session()->get('accion')): ?>
	<hr>
	<div class="alert
		<?php echo e(session()->get('accion')=='guardar'? 'alert-success':''); ?>

		<?php echo e(session()->get('accion')=='editar'? 'alert-primary':''); ?>

		<?php echo e(session()->get('accion')=='eliminar'? 'alert-danger':''); ?>"
		>
		<?php echo e(session()->get('mensaje')); ?>

	</div>
<?php endif; ?>

<table class="table">
  <thead class="thead-dark">
	<tr> 
	      <th scope="ido">Id</th>
	      <th scope="datoscliente">Datos de Cliente</th>
	      <th scope="descripciono">Descripción</th>
	      <th scope="numcontrato">Número de Contrato</th>   
	      <th scope="montototal">Monto Total</th>   
	      <th scope="estatus">Estatus</th>
	      <th scope="fechainicio">Fecha Inicio</th>
	      <th scope="fechafin">Fecha Fin</th>

		 <th><a href="<?php echo e(route('obracivil.create')); ?>"><button type="button" class="btn btn-secondary"> Registrar</button></a></th>
		<th><a href="<?php echo e(url('generaoPDF')); ?>" class="btn btn-outline-info" onclick="return confirm('¿Quieres implimir un reporte?')">Descargar PDF</a></th>  
		<th></th>
	 </tr> 
		<?php $__currentLoopData = $obras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr>	
			<td><?php echo e($obra->ido); ?></td>
			<td><?php echo e($obra->datoscliente); ?></td>
			<td><?php echo e($obra->descripciono); ?></td>
			<td><?php echo e($obra->numcontrato); ?></td>
			<td>$<?php echo e($obra->montototal); ?></td>
			<td><?php echo e($obra->estatus); ?></td>
			<td><?php echo e($obra->fechainicio); ?></td>
			<td><?php echo e($obra->fechafin); ?></td>
			
			<td><a href="<?php echo e(route('obracivil.show', $obra->ido)); ?>"><button type="submit" class="btn btn-success">Ver</button></a></td>

			<td><a href="<?php echo e(route('obracivil.edit', $obra->ido)); ?>"><button type="submit" class="btn btn-primary">Editar</button></a></td>
			
			<td><form method="POST" action="/obracivil/<?php echo e($obra->ido); ?>">
				<?php echo e(csrf_field()); ?>

				<input type="hidden" name="_method" value="delete">
				<button type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres eliminar el registro?')">Eliminar </button></td>
				
				
			</form>
		
		</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>
	<?php echo $obras->render(); ?>

	<?php $__env->stopSection(); ?>
<?php echo $__env->make("/..layoutusuario", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
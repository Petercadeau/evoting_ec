	<div class="row">
	<?php if ($cekvoting < 1): ?>
		<div class="col-sm-12">
			<div class="box box-danger box-solid">
				<div class="box-body">
					<h3 class="text-center"><i class="fa fa-warning"></i> Sin voto !</h3>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="box box-danger box-solid">
				<div class="box-header with-border">
					<h3 class="box-title"><i class="fa fa-th"></i> Agregar voto</h3>
				</div>
				<form action="<?=base_url('admin/tambah_voting');?>" method="POST" class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
							<label for="NombreVoting" class="col-sm-2 control-label">Nombre Voting :</label>
							<div class="col-sm-10">
								<input type="text" name="voting" class="form-control" placeholder="Ingrese el nombre de votante" required="required">
							</div>
						</div>
						<div class="form-group">
							<label for="Candidato" class="col-sm-2 control-label">Candidato :</label>
							<div class="col-sm-10">
								<select name="kandidat[]" class="form-control select2" data-placeholder="Elegir Candidato" multiple="multiple" style="width: 100%;" required="required">
									<?php foreach ($listkandidat as $lk): ?>
									<option value="<?=$lk->id_kandidat;?>"><?=$lk->nama_kandidat;?></option>
									<?php endforeach;?>
								</select>
								<?=(count($listkandidat) < 2) ? '<h5 class="text-red">Candidato debe ser mas de uno!</5>' : ''?>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<button type="reset" class="btn btn-flat btn-default"><i class="fa fa-refresh"></i> Reset</button>
						<button class="btn btn-flat btn-danger" <?=(count($listkandidat) < 2) ? 'disabled' : ''?>><i class="fa fa-check"></i> Agregar voto</button>
					</div>
				</form>
			</div>
		</div>
	<?php else: ?>
		<div class="col-sm-12">
			<div class="box box-info">
				<div class="box-body">
					<h2 class="text-center"><?=$voting->nama_voting;?></h2>
					<hr>
					<h3 class="text-center">Candidato</h3>
					<div class="tengah">
						<?php foreach ($kandidat as $k):?>
						<div class="col-sm-4">
							<div class="box box-danger box-solid">
								<div class="box-body box-profile">
									<img src="<?=base_url('./../assets/img/kandidat/'.$k->foto);?>" alt="" class="profile-user-img img-kandidat img-responsive img-circle">
									<h3 class="profile-username text-center"><?=$k->nama_kandidat;?></h3>
									<p class="text-muted text-center"><?=$k->keterangan;?></p>
									<h3 class="text-center"><span class="label label-danger">Poin : <?=$k->poin?></span></h3>
								</div>
							</div>
						</div>
					<?php endforeach;?>
					</div>
					<hr>
					<h3 class="text-center">Jumlah Votante <span class="label label-success"><?=$jmlpemilih;?></span></h3>
					<hr>
					<div class="col-sm-7">
						<div class="box box-info box-solid">
							<div class="box-header">
								<h4 class="box-title">Sudah Memilih</h4>
							</div>
							<div class="box-body">
								<table class="table table-pemilih table-hover table-bordered table-striped">
									<thead>
										<tr>
											<th>No.</th>
											<th>Nombre</th>
											<th>Waktu</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; foreach ($sudah_memilih as $sm): ?>
										<tr>
											<td><?=$no++?>.</td>
											<td><?=$sm->nama?></td>
											<td><?=$sm->waktu?></td>
										</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="box box-info box-solid">
							<div class="box-header">
								<h4 class="box-title">Belum Memilih</h4>
							</div>
							<div class="box-body">
								<table class="table table-pemilih table-hover table-bordered table-striped">
									<thead>
										<tr>
											<th>No.</th>
											<th>Nombre</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; foreach ($belum_memilih as $bm): ?>
										<tr>
											<td><?=$no++?>.</td>
											<td><?=$bm->nama?></td>
										</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button class="btn btn-warning btn-edit btn-flat" data-toggle="modal" data-target="#editVoting<?=$voting->id_voting;?>"><i class="fa fa-edit"></i> Edit</button>
					<button class="btn btn-danger btn-edit btn-flat pull-right hapus-voting" data='<?=$voting->id_voting?>'><i class="fa fa-trash"></i> Hapus Voting</button>
				</div>
			</div>
		</div>
		<!-- Modal edit voting -->
		<div class="modal fade" id="editVoting<?=$voting->id_voting;?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"><i class="fa fa-th"></i> Edit Voting</h4>
					</div>
					<div class="modal-body">
						<form action="<?=base_url('admin/edit_voting/'.$voting->id_voting);?>" method="POST">
							<div class="form-group">
								<label for="NombreVoting">Nombre Voting :</label>
									<input type="text" name="voting" class="form-control" value="<?=$voting->nama_voting;?>" placeholder="Ingrese el nombre de votante" required="required">
							</div>
							<!-- <div class="form-group">
								<label for="Candidato">Candidato :</label>
									<select name="kandidat[]" class="form-control select2" data-placeholder="Elegir Candidato" multiple="multiple" style="width: 100%;" required="required">
										<?php foreach ($listkandidat as $lk): ?>
										<option value="<?=$lk->id_kandidat;?>"><?=$lk->nama_kandidat;?></option>
										<?php endforeach;?>
									</select>
							</div> -->
							<button type="reset" class="btn btn-flat btn-default"><i class="fa fa-refresh"></i> Reset</button>
							<button class="btn btn-flat btn-danger" <?=(count($listkandidat) < 2) ? 'disabled' : ''?>><i class="fa fa-check"></i> Simpan</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php endif;?>
	</div>

	<script>
		$(function(){
			$('.select2').select2();
			$('.select22').select2();
			$('.table-pemilih').DataTable({
				'bFilter': false
			});
			$('.hapus-voting').on('click', function(e){
				e.preventDefault();
				var id = $(this).attr('data');
				Swal.fire({
					type: 'question',
					title: 'Hapus Voting ?',
					text: '¿Está seguro de que desea eliminar el voto? Todos los datos relacionados serán eliminados.',
					showCancelButton: true,
					confirmButtonText: 'Hapus'
				}).then((result) => {
					if (result.value) {
						window.location.assign('<?=base_url("admin/hapus_voting/")?>'+id);
					}
				});
				return false;
			})
		})
	</script>
	<?=($this->session->flashdata('ubah')) ? '<script>Swal.fire("Berhasil", "Perubahan berhasil disimpan", "success")</script>' : '';?>
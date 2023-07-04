						<form role="form" class="form-horizontal" method="POST" action="">
							<div class="form-group">
								<label class="col-lg-12 control-label" for="pass1">ID Matrik:</label>
								<div class="col-lg-12">
									<input type="text" id="pass1" class="form-control" name="txtmatricID" value="<?php if (isset($_POST['txtmatricID'])) ?><?php echo $_POST['txtmatricID']; ?>" required="">
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-12 control-label" for="pass1">No. Kad Pengenalan:</label>
								<div class="col-lg-12">
									<input type="text" id="pass1" class="form-control" name="txticno" value="<?php if (isset($_POST['txtmatricID'])) ?><?php echo $_POST['txtmatricID']; ?>" required="">
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-12 control-label" for="pass1">Nama:</label>
								<div class="col-lg-12">
									<input type="text" id="pass1" class="form-control" name="txtfullname" value="<?php if (isset($_POST['txtfullname'])) ?><?php echo $_POST['txtfullname']; ?>" required="">
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-12 control-label" for="pass1">Jantina:</label>
								<div class="col-lg-12">
									<select name="gender" id="gender" class="form-control" required="">
										<option value="">--Pilih Jantina--</option>
										<option value="Lelaki">Lelaki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-12 control-label" for="pass1">No. Telefon:</label>
								<div class="col-lg-12">
									<input type="text" id="pass1" class="form-control" name="txtphone" value="<?php if (isset($_POST['txtphone'])) ?><?php echo $_POST['txtphone']; ?>" required="">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-10">
									<button type="submit" name="btnsubmit" class="btn btn-light btn-radius btn-brd grd1">Teruskan >></button>
								</div>
							</div>
						</form>
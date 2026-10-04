<section role="main" class="content-body">
	<header class="page-header">
		<h2>Gallery</h2>
	</header>
	<section class="panel">
		<div class="panel-body">
			<?php if ($this->session->flashdata('error')): ?>
				<div class="alert alert-danger"><?php echo html_escape($this->session->flashdata('error')); ?></div>
			<?php endif; ?>
			<?php if ($this->session->flashdata('message')): ?>
				<div class="alert alert-success"><?php echo html_escape($this->session->flashdata('message')); ?></div>
			<?php endif; ?>

			<div class="row">
				<div class="col-md-4">
					<section class="panel panel-primary">
						<header class="panel-heading"><h2 class="panel-title">Add Category</h2></header>
						<div class="panel-body">
							<?php echo form_open('admins/gallery/add_category'); ?>
								<div class="form-group">
									<label for="category_name">Category name</label>
									<input type="text" name="name" id="category_name" class="form-control" maxlength="150" required>
								</div>
								<div class="form-group">
									<label for="category_sort_order">Sort order</label>
									<input type="number" name="sort_order" id="category_sort_order" class="form-control" min="0" value="0" required>
								</div>
								<div class="checkbox-custom checkbox-default">
									<input type="checkbox" name="isactive" id="category_isactive" value="1" checked>
									<label for="category_isactive">Active</label>
								</div>
								<button type="submit" class="btn btn-primary">Add Category</button>
							<?php echo form_close(); ?>
						</div>
					</section>

					<section class="panel">
						<header class="panel-heading"><h2 class="panel-title">Categories</h2></header>
						<div class="panel-body table-responsive">
							<table class="table table-bordered table-striped">
								<thead><tr><th>Category</th><th>Sort order / status</th><th>Photos</th><th>Actions</th></tr></thead>
								<tbody>
									<?php foreach ($categories as $category): ?>
										<tr>
											<td><?php echo html_escape($category['name']); ?></td>
											<td>
												<?php echo form_open('admins/gallery/update_category'); ?>
													<input type="hidden" name="category_id" value="<?php echo (int) $category['id']; ?>">
													<input type="number" name="sort_order" min="0" value="<?php echo (int) $category['sort_order']; ?>" class="form-control" style="max-width:90px" required>
													<select name="isactive" class="form-control" style="max-width:110px">
														<option value="1" <?php echo (int) $category['isactive'] === 1 ? 'selected' : ''; ?>>Active</option>
														<option value="0" <?php echo (int) $category['isactive'] === 0 ? 'selected' : ''; ?>>Inactive</option>
													</select>
													<button type="submit" class="btn btn-primary btn-xs">Save</button>
												<?php echo form_close(); ?>
											</td>
											<td><?php echo (int) $category['photo_count']; ?></td>
											<td>
												<?php echo form_open('admins/gallery/delete_category', array('onsubmit' => "return confirm('Delete this category? Categories with photos cannot be deleted.')")); ?>
													<input type="hidden" name="category_id" value="<?php echo (int) $category['id']; ?>">
													<button type="submit" class="btn btn-danger btn-xs">Delete</button>
												<?php echo form_close(); ?>
											</td>
										</tr>
									<?php endforeach; ?>
									<?php if (empty($categories)): ?>
										<tr><td colspan="4">No categories yet.</td></tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</section>
				</div>

				<div class="col-md-8">
					<section class="panel panel-primary">
						<header class="panel-heading"><h2 class="panel-title">Upload Photo</h2></header>
						<div class="panel-body">
							<?php if (empty($categories)): ?>
								<p>Add a category before uploading a photo.</p>
							<?php else: ?>
								<?php echo form_open_multipart('admins/gallery/upload_photo'); ?>
									<div class="form-group">
										<label for="photo_category">Category</label>
										<select name="category_id" id="photo_category" class="form-control" required>
											<option value="">Select category</option>
											<?php foreach ($active_categories as $category): ?>
												<option value="<?php echo (int) $category['id']; ?>"><?php echo html_escape($category['name']); ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="form-group">
										<label for="photo_title">Photo title</label>
										<input type="text" name="title" id="photo_title" class="form-control" maxlength="200" required>
									</div>
									<div class="form-group">
										<label for="gallery_image">Photo (JPG, PNG or GIF, max 12 MB)</label>
										<input type="file" name="image" id="gallery_image" class="form-control" accept=".jpg,.jpeg,.png,.gif" required>
									</div>
									<button type="submit" class="btn btn-primary">Upload Photo</button>
								<?php echo form_close(); ?>
							<?php endif; ?>
						</div>
					</section>

					<section class="panel">
						<header class="panel-heading"><h2 class="panel-title">Uploaded Photos</h2></header>
						<div class="panel-body table-responsive">
							<table class="table table-bordered table-striped">
								<thead><tr><th>Photo</th><th>Title</th><th>Category</th><th>Action</th></tr></thead>
								<tbody>
									<?php foreach ($images as $image): ?>
										<tr>
											<td><img src="<?php echo html_escape(site_url('userfiles/gallery/thumbnail/'.basename($image['image']))); ?>" alt="" style="max-width:100px;height:auto"></td>
											<td><?php echo html_escape($image['title']); ?></td>
											<td><?php echo html_escape($image['category_name']); ?></td>
											<td>
												<?php echo form_open('admins/gallery/delete_photo', array('onsubmit' => "return confirm('Delete this photo?')")); ?>
													<input type="hidden" name="photo_id" value="<?php echo (int) $image['id']; ?>">
													<button type="submit" class="btn btn-danger btn-xs">Delete</button>
												<?php echo form_close(); ?>
											</td>
										</tr>
									<?php endforeach; ?>
									<?php if (empty($images)): ?>
										<tr><td colspan="4">No photos uploaded yet.</td></tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>
		</div>
	</section>
</section>

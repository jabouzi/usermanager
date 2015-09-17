	<div id="right-container">
		<div id="content-page">
			<?php display_message(); ?>
				<form action="/<?php echo get_site_lang(); ?>/application/processimport" method="post" enctype="multipart/form-data">
					<fieldset>
						<table class="form-table" align="center" border="1" cellpadding="5" cellspacing="0" width="100" style="width:100%;table-layout:fixed">
							<tbody>
								<tr>
									<td colspan="2">
										<?php echo lang('text.upload.types'); ?>
									</td>
								</tr>
								<tr>
									<td><label for="accountsfile"><?php echo lang('form.accounts.file'); ?>:</label></td>
									<td><input type="file" id="accountsfile" name="accountsfile" value="Choose"/></td>
								</tr>
								<tr>
									<td><label for="submit"> </label></td>
									<td><input id="submit" type="submit" class="submitbutton" value="Upload" /></td>
								</tr>


								<tr><td><h4><?php echo lang('text.file.examples'); ?>:</h4></td></tr>

								<tr><td><a href="/public/docs/example.csv">CSV</a></td>   </tr>
								<tr><td><a href="/public/docs/example.json">JSON</a></td> </tr>
								<tr><td><a href="/public/docs/example.xls">Excel</a></td> </tr>
								<tr><td><a href="/public/docs/example.xml">XML</a></td>  </tr>

							</tbody>
							</table>
						</fieldset>
					</form>
				</div>
			</div>
		</div>

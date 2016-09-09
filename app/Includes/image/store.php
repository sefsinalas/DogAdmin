<?php
	$aux = $request->file($properties['name'])->move(
											        base_path() . '/public/img/upload/'
											    );

	$data[$properties['name']] = basename($aux);
?>
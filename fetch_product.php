<?php 
	$url = 'https://fakestoreapi.com/products';
	$data = file_get_contents($url);
	$products = json_decode($data, true);
	// echo '<pre>';
	// print_r($products);
	// echo '</pre>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
	
	<div class="container-fluid">
		
	<div class="row">
		<?php 

			foreach($products as $product){

		?>
		<div class="col-md-3">
			<div class="card">
				<div class="card-body">
					<img src="<?=$product['image']?>" class="img-fluid">
					<h3><?=$product['title']?></h3>
					<h6><?=$product['price']?></h6>
				</div>
			</div>
		</div>
	<?php } ?>


	</div>
	</div>




</body>
</html>
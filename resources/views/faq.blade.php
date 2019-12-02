@extends('index')

@section("content")
<section class="faq padding container">
	{{ Breadcrumbs::render('faq') }}

	<div class="titulos">FAQ</div>
	<div class="container" id="accordion">
		<div class="faqHeader">Generales</div>
		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
			<div class="card ">
				<div class="card-header">
					<h4 class="card-header hover-naranja">
						¿Nuestros productos son ORIGINALES?

					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in">
					<div class="card-block">
						Sí, todos nuestros productos son 100% ORIGINALES.
					</div>
				</div>
			</div>
		</a>
		<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">
			<div class="card">
				<div class="card-header ">
					<h4 class="card-header hover-naranja">
						¿Hacen envíos al Interior?
					</h4>
				</div>
				<div id="collapseTen" class="panel-collapse collapse">
					<div class="card-block">
						Sí, hacemos envios a todo el país por Correo Argentino por contrareembolso.
					</div>
				</div>
			</div>
		</a>
		<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">
			<div class="card ">
				<div class="card-header">
					<h4 class="card-header hover-naranja">
						¿Lo puedo retirar personalmente?
					</h4>
				</div>
				<div id="collapseEleven" class="panel-collapse collapse">
					<div class="card-block">
						Sí, lo puedes retirar personalmente, o podemos enviartelo a tu casa.
					</div>
				</div>
			</div>
		</a>
		<div class="faqHeader"></div>
		<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
			<div class="card ">
				<div class="card-header">
					<h4 class="card-header hover-naranja">
						¿Los productos tienen garantía?
					</h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse">
					<div class="card-block">
						Sí, todos nuestros artículos tienen garantía, y en caso de sufrir algún problema se lo reemplazaremos por otro igual. En caso de no tener uno igual al adquirido para su reemplazo, reintegraremos el importe de su compra.
					</div>
				</div>
			</div>
		</a>
	</div>
	</div>



</section>

@endsection
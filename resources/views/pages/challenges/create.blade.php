@extends('layouts.app')

@section('title-page', 'Adicionar Desafio')

@section('title-toolbar', 'Adicionar Desafio')

@section('content')
	@include('layouts.title')
	<div class="row">
		<div class="col-6 offset-3">
			<div class="card">
				<div class="card-body">
					<form action="{{ route('challenges.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
						@include('pages.challenges._form')
						<div class="d-flex justify-content-between">
							<a href="{{ route('challenges.index') }}" class="btn btn-light mt-2">Voltar</a>
							<button type="submit" class="btn btn-primary btn-active-danger mt-2">Cadastrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
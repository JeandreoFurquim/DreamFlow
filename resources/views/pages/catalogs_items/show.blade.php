@extends('layouts.app')

@section('title-page', $contents->name)

@section('title-toolbar', $contents->name)

@section('content')
<div class="row pb-12 m-0 background-dashboard" style="background-image: url('{{ asset('/assets/media/images/bg_colors_03.jpg') }}');">
    <div class="col-12">
        <div class="toolbar py-15" id="kt_toolbar">
            <div id="kt_toolbar_container" class=" container-xxl  d-flex justify-content-center">
				<div class="page-title">
					<h1 class="text-white fw-bold my-1 fs-2x text-center">
						{!! $contents->name !!}
						<a href="{{ route('catalogs.items.edit', $contents->id) }}" class="btn btn-icon btn-light rounded">
							<i class="fa-solid fa-pen-to-square text-primary fs-2"></i>
						</a>
					</h1>
				</div>
            </div>
        </div>
    </div>
</div>
<div class="app-main flex-column flex-row-fluid " id="kt_app_main">
	<div class="d-flex flex-column flex-column-fluid">                             
		<div id="kt_app_content" class="app-content  flex-column-fluid py-6" >
			<div id="kt_app_content_container" class="app-container  container-fluid ">
				<div class="row" style="margin-top: -75px">
					<div class="col-2">
						<div class="card shadow-sm">
							<div class="card-body">
								<p class="text-gray-700 text-center fw-bold fs-2">{{ $contents->catalog->name }}</p>
								@foreach ($contents->catalog->items as $item)
								<p class="mb-1">
									<a href="{{ route('catalogs.items.show', $item->id) }}" class="text-gray-700 text-hover-primary fs-6">
										{{ $item->name }}
									</a>
								</p>
								@endforeach
								<a href="{{ route('catalogs.items.create', $contents->catalog_id) }}" class="btn btn-sm btn-success btn-active-primary w-100 mb-1 mt-2">Adicionar</a>
								<p class="text-center mt-2">
									<a href="{{ route('catalogs.show', $contents->catalog_id) }}" class="text-muted w-100">Voltar</a>
								</p>
							</div>
						</div>
					</div>
					<div class="col-10">
						<div class="card shadow-sm">
							<div class="card-body">
								<div class="row">
									<div class="col-12 text-center">
										<img src="{{ findImage('catalogos/' .$contents->catalog->id . '/' . $contents->id . '/capa-1200px.jpg', 'beautiful') }}" class="rounded mb-5 w-600px">
									</div>
									@if ($contents->link_video)
									<div class="col-6 mb-4">
										<p class="text-gray-700 fw-bold text-uppercase mb-1">Link do vídeo:</p>
										{!! $contents->link_video !!}
									</div>
									@endif
									@if ($contents->link_blog)
									<div class="col-6 mb-4">
										<p class="text-gray-700 fw-bold text-uppercase mb-1">Link do artigo:</p>
										{!! $contents->link_blog !!}
									</div>
									@endif
									@if ($contents->content)
									<div class="list-style">
										<p class="text-gray-700 fw-bold text-uppercase mb-1">Informações:</p>
										{!! $contents->content !!}
									</div>
									@else
										<div class="rounded bg-light d-flex align-items-center justify-content-center h-200px h-md-200px">
											<div class="text-center">
												<p class="m-0 fs-3x">🥹</p>
												<p class="m-0 text-gray-600 fw-bold text-uppercase">Esse item ainda não possui conteúdo!</p>
												<p class="m-0 fs-6 text-gray-500">Para adicionar conteúdo a esse item, clique no botão editar abaixo.</p>
											</div>
										</div>
									@endif
								</div>
							</div>
						</div>
					</div>
</div>
@include('includes.preview-image')
@endsection
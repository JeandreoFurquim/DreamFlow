<div class="row">
    <div class="col-4 mb-5">
        <label class="required form-label fw-bold">Nome:</label>
        <input type="text" class="form-control form-control-solid" placeholder="Nome da categoria" name="name" value="{{ $content->name ?? old('name') }}" required/>
    </div>
    <div class="col-4 mb-5">
        <label class="form-label fw-bold required">Tipo:</label>
        <select class="form-select form-select-solid" name="type" data-control="select2" data-placeholder="Selecione" required>
            <option value=""></option>
            <option value="expense" selected>Despesa</option>
            <option value="revenue">Receita</option>
        </select>
    </div>
    <div class="col-4 mb-5">
        <label class="form-label fw-bold">Categoria:</label>
        <select class="form-select form-select-solid" name="category_id" data-control="select2" data-placeholder="Selecione" data-allow-clear="true">
            <option value=""></option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if(isset($content) && $content->category_id == $category->id) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-6 mb-5 has-father" style="@if(isset($content) && $content->category_id) display:none; @endif">
        <label class="required form-label fw-bold">Cor:</label>
        <input type="color" class="form-control form-control-solid" placeholder="Selecione uma cor" name="color" value="{{ $content->color ?? '#009ef7' }}" required/>
    </div>
    <div class="col-6 mb-5 has-father" style="@if(isset($content) && $content->category_id) display:none; @endif">
        <label class="required form-label fw-bold">Ícone:</label> <a href="https://fontawesome.com/search?o=r&m=free" class="fs-7 fw-normal" target="_blank">Font Awesome</a>
        <input type="text" class="form-control form-control-solid" placeholder="fa-solid fa-pen-to-square" name="icon" value="{{ $content->icon ?? old('icon')}}" required/>
    </div>
    <div class="col-12 mb-5">
        <label class="form-label fw-bold">Descrição:</label>
        <textarea name="description" class="form-control form-control-solid" placeholder="Alguma observação sobre este projeto?">@if(isset($content->description)){{$content->description}}@endif</textarea>
    </div>
</div>


@section('custom-footer')
<script>
    // IF HAS CATEGORY FATHER
    $('[name="category_id"]').change(function(){

        // GET NAME
        var father = $(this).val();

        // IF HAS FATHER
        if(father){
            $('.has-father').hide();
            $('.has-father').find('input').prop('required', false);
        } else {
            $('.has-father').show();
            $('.has-father').find('input').prop('required', true);
        }

    });
</script>
@endsection
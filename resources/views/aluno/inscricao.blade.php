{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('content_header')

@stop

@section('content')
@include('alerts')

@auth
<div class="col-md-6">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Inscrição para TCC</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form enctype="multipart/form-data" method="POST" action="/inscricao">
    @csrf
    <div class="box-body"> 
        
        <div class="row">
            <div class="form-group col-md-3">
                <label for="edital">Edital</label>
                <select id="edital" name="edital" class="form-control">
                    <option value="">Selecione</option>
                    @if ( isset($editais_ativos))
                        @foreach($editais_ativos as $edital)
                            <option value="{{ $edital->id }}" {{ (old("edital") == $edital->id ? "selected":"") }}>{{$edital->anoReferencia}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <fieldset>
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Projeto de Pesquisa</h3>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="show" for="tituloProjetoPesquisa">Título do Projeto de Pesquisa</label>
                        <input class="form-control" name="tituloProjetoPesquisa" id="tituloProjetoPesquisa" type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="show" for="projetoPesquisa">Arquivo do Projeto de Pesquisa</label>
                        <input name="projetoPesquisa" id="projetoPesquisa" type="file">
                        <p class="help-block">O arquivo tem que estar no formato PDF.</p>
                    </div>
                </div>
            </div>
        </fieldset>

        <div class="box">
            <div class="row">
                    <div class="form-group col-md-6">
                        <label for="lattesUrl">URL do seu lattes</label>
                        <input class="form-control" name="lattesUrl" type="url" value="{{ old("lattesUrl") or '' }}" />
                    </div>
            </div>
        </div>
        <div class="box">
            <fieldset id="fs_opc1">
                <div class="box-header with-border">
                    <h3 class="box-title">Opções para Orientadores</h3>
                </div>
                <div class="row form-group">
                    <div class="form-inline col-md-8">
                        <label class="form-group show" for="opcao_um">Primeira Opção</label>
                        <select name="opcao_um" id="opcao_um" class="form-control">
                            <option value="">Selecione</option>
                            @if (isset($docentes))
                                @foreach($docentes as $docente)
                                    <option value="{{ $docente->id }}" {{ (old("opcao_um") == $docente->id ? "selected":"") }}>{{$docente->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        <button id="btn_add_opc_1" type="button" class="btn btn-success"><i class="fa fa-fw fa-plus"></i></button>
                    </div>
                </div>  
            </fieldset>
            <!-- <div class="row"> -->
            
            <!-- </div> -->
            <fieldset class="hidden" id="fs_opc2" disabled="">
                <div class="row form-group">
                    <div class="form-inline col-md-8">
                    <label class="show" for="opcao_dois">Segunda Opção</label>
                        <select name="opcao_dois" id="opcao_dois" class="form-control" >
                        </select>
                        <button id="btn_add_opc_2" type="button" class="btn btn-success"><i class="fa fa-fw fa-plus"></i></button>
                        <button id="btn_rm_opc_2" type="button" class="btn btn-danger"><i class="fa fa-fw fa-minus"></i></button>
                    </div>
                </div>
            </fieldset>  
            <fieldset class="hidden" id="fs_opc3" disabled="">
                <div class="row form-group">
                    <div class="form-inline col-md-8">
                    <label class="show" for="opcao_tres">Terceira Opção</label>
                        <select name="opcao_tres" id="opcao_tres" class="form-control" >
                        </select>
                        <button id="btn_rm_opc_3" type="button" class="btn btn-danger"><i class="fa fa-fw fa-minus"></i></button>
                    </div>
                </div>
            </fieldset>
        </div>
        <div id="hdn_fields"></div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Gravar</button>
        </div>
    </div>
    </form>
  </div>
</div>
@else
    Você ainda não fez seu login com a senha única USP <a href="/login"> Faça seu Login! </a>
@endauth
@stop

@section('js')

<script>
$(document).ready(function(){
     $('#btn_add_opc_1').click(function(){
        $('#fs_opc2').removeClass("hidden");
        $('#fs_opc2').removeAttr("disabled");
        $('#opcao_dois option').remove();
        $('#opcao_dois').append($('#opcao_um option').clone());
        $('#opcao_dois option[value='+$('#opcao_um').val()+']').remove();
        $('#fs_opc1').prop("disabled", true);
        $('#hdn_fields').append('<div><input type="hidden" name="opcao_um" value="'+$('#opcao_um').val()+'"/></div>');
    });
     $('#btn_add_opc_2').click(function(){
        $('#fs_opc3').removeClass("hidden");
        $('#fs_opc3').removeAttr("disabled");
        $('#opcao_tres option').remove();
        $('#opcao_tres').append($('#opcao_dois option').clone());
        $('#opcao_tres option[value='+$('#opcao_dois').val()+']').remove();
        $('#fs_opc2').prop("disabled", true);
        $('#hdn_fields').append('<div><input type="hidden" name="opcao_dois" value="'+$('#opcao_dois').val()+'"/></div>');
     });
     $('#btn_rm_opc_2').click(function(){
        $('#fs_opc1').removeAttr("disabled");
        $('#hdn_fields').find('input[type="hidden"][name="opcao_um"]').remove();
        $('#fs_opc3').addClass("hidden");
        $('#fs_opc3').prop("disabled", true);
        $('#fs_opc2').addClass("hidden");
        $('#fs_opc2').prop("disabled", true);
     });
     $('#btn_rm_opc_3').click(function(){
        $('#hdn_fields').find('input[type="hidden"][name="opcao_dois"]').remove();
        $('#fs_opc2').removeAttr("disabled");
        $('#fs_opc3').addClass("hidden");
        $('#fs_opc3').prop("disabled", true);
     });

    var $dropDown = $('#my-select') , 
    name = $dropDown.prop('name') , 
    $form = $dropDown.parent('form');

    $dropDown.data('original-name',name);  //store the name in the data attribute 

    $('#toggle').on('click', function(event) {
        if($dropDown.is('.disabled')){
            //enable it 
            $form.find('input[type="hidden"][name='+name+']').remove(); // remove the hidden fields if any
            $dropDown.removeClass('disabled')  //remove disable class 
                     .prop({name : name , disabled : false}); //restore the name and enable 
        } else {
            //disable it 
            var $hiddenInput = $('<input/>' , {type : 'hidden' , name: name , value:$dropDown.val() });
            $form.append( $hiddenInput );  //append the hidden field with same name and value from the dropdown field 
            $dropDown.addClass('disabled')  //disable class
                     .prop({'name' : name + "_1" , disabled : true}); //change name and disbale 
        }
    });
});
</script>

@stop
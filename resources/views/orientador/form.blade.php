<div class="row">
        <div class="col-md-6">
            
            <div class="box box-primary">
                <div class="box-header">
                    <h2 class="box-title">{{ $title }}
                        @if (isset($edital->anoReferencia) && isset($user->id))
                            - {{ $edital->anoReferencia}}
                        @endif
                        - <b>Não funcional</b>
                    </h2>
                </div>
                <div class="box-body">
                <div class="form-group">
                        <label>Quantidade de vagas para orientandos</label>                        
                        <div class="row">
                            <div class="form-group col-md-3">
                                <div class="input-group">
                               
                                    <input class="form-control" name="numVagas" id="numVagas" type="number" min="0" step="1"
                                           value="{{ $edital->numVagas or old('numVagas')}}">
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group required-field-block">
                            <label>Temas de Orientação</label>
                            <div class="col-md-12 input-group">
                                
                                <textarea class="form-control" name="temasOrientacao" id="temasOrientacao" rows="8" style="resize: vertical;">{{ $edital->temasOrientacao or old('temasOrientacao') }}</textarea>

                            </div>
                        </div>
                    </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Gravar</button>
                </div>
            </div>
        </div>
    </div>

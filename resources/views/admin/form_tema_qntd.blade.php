<div class="box-body">
                    @can('ADMIN')
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="edital">Edital</label>
                            <select name="edital" class="form-control">
                                <option>Selecione</option>
                                @if ( isset($editais_ativos))
                                    @foreach($editais_ativos as $edital)
                                        <option value="{{ $edital->id }}">{{$edital->anoReferencia}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="docente">Docente</label>
                            <select name="docente" id="docente" class="form-control">
                                <option>Selecione</option>
                                @if (isset($docentes))
                                    @foreach($docentes as $docente)
                                        <option value="{{ $docente->id }}">{{$docente->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    @endcan
                    
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="numVagas">Quantidade de vagas para orientandos</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <input class="form-control" name="numVagas" id="numVagas" type="number" min="0" step="1"
                                        @if ($cadtema){
                                            value="{{ $cadtema['pivot']['numVagas'] or old('numVagas')}}" 
                                        @else
                                            value=""
                                        @endif
                                        />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group required-field-block">
                        <label for="temasOrientacao">Temas de Orientação</label>
                        <div class="col-md-12 input-group">
                            <textarea class="form-control" name="temasOrientacao" id="temasOrientacao" 
                                      rows="8" style="resize: vertical;"
                                >@if($cadtema){{ $cadtema['pivot']['temasOrientacao'] or old('temasOrientacao')}}@endif</textarea>
                        </div>
                    </div>
                </div>
                
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Gravar</button>
                </div>
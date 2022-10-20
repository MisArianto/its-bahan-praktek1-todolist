<div>

    <div class="container pt-5">
        <div class="row">
            <h4 class="text-center text-muted mb-5">Aplikasi Jadwal Pelajaran</h4>
            @foreach ($haris as $hari)
            <div class="col-md-4 mb-3">
                <div class="card border-primary" style="width: 18rem;border-style: dotted;">
                    <div class="card-body">
                        
                        @if ($inputMode && $indexing == $hari->id)
                        <div class="input-group">
                            <input type="text" wire:model.lazy="pelajaran" class="form-control {{ $errors->has('pelajaran') ? ' is-invalid' : '' }}" placeholder="Jadwal pelajaran">

                            @if ($editMode)
                            <button class="btn btn-primary" type="button" wire:click="update">
                                <i class="bi bi-save"></i>
                            </button>
                            @else
                            <button class="btn btn-primary" type="button" wire:click="store">
                                <i class="bi bi-save"></i>
                            </button>
                            @endif
                            


                            <button class="btn btn-danger" wire:click="close" type="button">
                                <i class="bi bi-x-circle"></i>
                            </button>
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('pelajaran') }}</strong>
                            </span>
                          </div>
                        @else
                            
                        <h5 class="card-title">
                            <div class="float-start">
                              {{ $hari->nama }}
                          </div>
                          <div class="float-end">
                              <a href="javascript:void(0)" wire:click='tambah({{ $hari->id }})' title="Tambah">
                                <i class="bi bi-plus-circle"></i>
                            </a>
                        </div>
                        </h5>
                        @endif
                        
                        
                        <br>
                      <h6 class="card-subtitle mb-2 text-muted">Mata Pelajaran</h6>
                      
                      <ul>
                          @foreach ($hari->jadwals as $item)
                          <li>
                              <span class="float-start">
                                  {{ $item->pelajaran }}
                              </span>
                              <span class="float-end">
                                <i class="bi bi-pencil-square" role="button" wire:click="edit({{ $item->id }}, {{ $item->hari_id }})"></i>
                                <i class="bi bi-trash" role="button" wire:click="destroy({{ $item->id }})"></i>
                              </span>
                            </li>
                          @endforeach
                      </ul>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
    
</div>

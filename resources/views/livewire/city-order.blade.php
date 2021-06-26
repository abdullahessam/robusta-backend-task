<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card-body">
        <form>
            <div class=" add-input">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            {!! Form::select('city_id',$this->cities->pluck('name','id'),null,['class'=>'form-control','wire:model'=>'city_id.'.$i+1])!!}
                            @error('city_id.'.$i+1) <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="number" class="form-control" wire:model="order.{{$i+1}}"
                                   placeholder="Enter City order on the line">
                            @error('order.'.$i+1) <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Add</button>
                    </div>
                </div>
            </div>
            @foreach($inputs as $key => $value)
                <div class=" add-input">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                {!! Form::select('city_id',$this->cities->pluck('name','id'),null,['class'=>'form-control','wire:model'=>'city_id.'. $value ])!!}

                                @error('city_id.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="number" class="form-control" value="{{$this->order[$value]}}" wire:model="order.{{ $value }}"
                                       placeholder="Enter City order on the line">
                                @error('order.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$value}})">remove</button>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col-md-12">
                    <button type="button" wire:click.prevent="store()" class="btn btn-success btn-sm">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

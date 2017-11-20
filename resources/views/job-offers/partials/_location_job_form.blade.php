
        <div class="col-md-3">

            <div class="form-group text-muted">
                {!! Form::label('country', 'Pais') !!}
                <select id="country" class="form-control" name="country" required>
                    <option selected="selected" value="{{ $jobOffer->location->city->state->country->id }}">
                        {{ $jobOffer->location->city->state->country->name }}
                    </option>
                    @foreach($countries as $country)
                        @unless($country->id === $jobOffer->location->city->state->country->id)
                            <option value={{ $country->id }}>{{ $country->name }}</option>
                        @endunless
                    @endforeach
                </select>
            </div>

        </div>
        <div class="col-md-3">

            <div class="form-group text-muted">
                {!! Form::label('state', 'Departamento') !!}
                <select id="state" class="form-control" name="state" required>
                    <option selected="selected" value="{{ $jobOffer->location->city->state->id }}">
                        {{ $jobOffer->location->city->state->name }}
                    </option>
                    @foreach($states as $state)
                        @if($state->country_id === $jobOffer->location->city->state->country->id)
                            @unless($state->id === $jobOffer->location->city->state->id)
                                <option value={{ $state->id }}>{{ $state->name }}</option>
                            @endunless
                        @endif
                    @endforeach
                </select>
            </div>

        </div>
        <div class="col-md-3 text-muted">

            <div class="form-group">
                {!! Form::label('city', 'Ciudad') !!}
                <select id="city" class="form-control" name="city_id" required>
                    <option selected="selected" value="{{ $jobOffer->location->city->id }}">
                        {{ $jobOffer->location->city->name }}
                    </option>
                    @foreach($cities as $city)
                        @if($city->state_id === $jobOffer->location->city->state->id)
                            @unless($city->id === $jobOffer->location->city->id)
                                <option value={{ $city->id }}>{{ $city->name }}</option>
                            @endunless
                        @endif
                    @endforeach
                </select>
            </div>

        </div>


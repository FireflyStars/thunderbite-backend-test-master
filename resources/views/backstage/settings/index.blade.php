@extends('backstage.layouts.admin')

@section('moduleNav')
    @php
        $model = new App\Models\Setting();
        $model->createNavigation('index');
    @endphp
@endsection

@section('content')

    <div class="card">
        <div class="card-header">Settings</div>
        <div class="card-body">
            {!! Form::model($currentCampaign, ['url' => '/backstage/settings', 'method' => 'put', 'class' => 'form-horizontal', 'novalidate']) !!}

            <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-3 control-label">Name</label>

                <div class="col-md-7">
                    <input id="name" type="text" class="form-control" name="name"
                           value="{{ $currentCampaign->name ?? old('name') }}">

                    @if ($errors->has('name'))
                        <span class="error-message">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                    @endif
                </div>
            </div>

            <div class="form-group row{{ $errors->has('timezone') ? ' has-error' : '' }}">
                <label for="timezone" class="col-md-3 control-label">Timezone</label>

                <div class="col-md-7">
                    <select name="timezone" id="timezone" class="form-control">
                        @foreach($timezones as $timezone)
                            <option value="{{ $timezone }}" {{ ((old('timezone') == 1 || (isset($currentCampaign) && $currentCampaign->timezone == $timezone)) ? 'selected' : '') }}>{{ $timezone }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('timezone'))
                        <span class="error-message">
                                <strong>{{ $errors->first('timezone') }}</strong>
                            </span>
                    @endif

                </div>
            </div>

            <div class="form-group row{{ $errors->has('start_date') ? ' has-error' : '' }}">
                <label for="start_date" class="col-md-3 control-label">Start date</label>

                <div class="col-md-7">
                    <div class="input-group date" id="start_date" data-target-input="nearest">
                        <input type="text" value="{{ !empty($currentCampaign->start_date) ? \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',
                         $currentCampaign->start_date, 'UTC')->setTimezone($currentCampaign->timezone) : '' }}"
                               class="form-control datetimepicker-input" name="start_date" data-target="#start_date"/>
                        <div class="input-group-append" data-target="#start_date" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>

                    @if ($errors->has('start_date'))
                        <span class="error-message">
                                <strong>{{ $errors->first('start_date') }}</strong>
                            </span>
                    @endif

                </div>
            </div>

            <div class="form-group row{{ $errors->has('end_date') ? ' has-error' : '' }}">
                <label for="end_date" class="col-md-3 control-label">End date</label>

                <div class="col-md-7">
                    <div class="input-group date" id="end_date" data-target-input="nearest">
                        <input type="text" value="{{ !empty($currentCampaign->end_date) ? \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',
                         $currentCampaign->end_date, 'UTC')->setTimezone($currentCampaign->timezone) : '' }}"
                               class="form-control datetimepicker-input" name="end_date" data-target="#end_date"/>
                        <div class="input-group-append" data-target="#end_date" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>

                    @if ($errors->has('end_date'))
                        <span class="error-message">
                                <strong>{{ $errors->first('end_date') }}</strong>
                            </span>
                    @endif

                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('debug', 'Debug?', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::checkbox('debug', 1, (!isset($settings['debug']) || $settings['debug'] == 0) ? 0 : 1, ['class' => 'toggleSwitch', 'data-on-color' => 'success']) !!}
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('css', 'Custom css', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::textarea('css', null, ['id' => 'css', 'class' => 'form-control', 'required', 'data-rule-number' => 'true']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-sm-3 col-sm-7">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>

@endsection

@push('js')

    <script type="text/javascript">

        var editor = CodeMirror.fromTextArea(document.getElementById("css"), {
            autoCloseTags: true,
            autoCloseBrackets: true,
            mode: "text/css",
            lineNumbers: true,
            gutters: ["CodeMirror-linenumbers", "breakpoints"]
        });

        $(document).ready(function () {

            var startDate = $('#start_date');

            startDate.datetimepicker({
                keepOpen: false,
                format: 'YYYY-MM-DD HH:mm:ss',
                icons: {
                    time: 'far fa-clock',
                    date: 'fal fa-calendar',
                    up: 'far fa-arrow-up',
                    down: 'far fa-arrow-down',
                    previous: 'far fa-chevron-left',
                    next: 'far fa-chevron-right',
                    today: 'far fa-calendar-check-o',
                    clear: 'far fa-trash',
                    close: 'far fa-times'
                },
            });

            startDate.on('change.datetimepicker', function () {
                var date = startDate.datetimepicker('date');
                var now = moment();
                if (date.hours() === now.hours() && date.minutes() === now.minutes()) {
                    date.hours(0).minutes(0).seconds(0);
                    startDate.datetimepicker('date', date);
                }
            });

            var endDate = $('#end_date');

            endDate.datetimepicker({
                keepOpen: false,
                format: 'YYYY-MM-DD HH:mm:ss',
                icons: {
                    time: 'far fa-clock',
                    date: 'fal fa-calendar',
                    up: 'far fa-arrow-up',
                    down: 'far fa-arrow-down',
                    previous: 'far fa-chevron-left',
                    next: 'far fa-chevron-right',
                    today: 'far fa-calendar-check-o',
                    clear: 'far fa-trash',
                    close: 'far fa-times'
                },
            });

            endDate.on('change.datetimepicker', function () {
                var date = endDate.datetimepicker('date');
                var now = moment();
                if (date.hours() === now.hours() && date.minutes() === now.minutes()) {
                    date.hours(23).minutes(59).seconds(59);
                    endDate.datetimepicker('date', date);
                }
            });

            $('.toggleSwitch').bootstrapSwitch();

        });

    </script>

@endpush

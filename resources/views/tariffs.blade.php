@extends('layouts.app')

@section('content')
    <header>
        @include('layouts.partials.header')
    </header>
    <div class="d-flex">
        <div class="w-50 text-center">
            <h4>минимальный</h4>
            <p style="color: red ; font-weight: bold;">1000 рублей</p>
            <a href="#" class="btn btn-secondary btn-send" id="t1">Выбрать</a>
        </div>
        <div class="w-50 text-center">
            <h4>стандартный</h4>
            <p style="color: red ; font-weight: bold;">5000 рублей</p>
            <a href="#" class="btn btn-secondary btn-send" id="t2">Выбрать</a>
        </div>
    </div>
    <div id="selected" class="text-center font-weight-bold"></div>
@endsection

@section('scripts')
    <script>
        $(document).on('click', '.btn-send', (event) => {
           // alert(event.currentTarget.id);
            event.preventDefault();
            let iddata = event.currentTarget.id;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            });
            $.ajax({
                method: 'POST',
                url: '{{route('tariff.select')}}',
                data: {id: iddata},
                //contentType: false,
                //processData: false,
                success: (result) => {
                    $('#selected').html(result.success);
                },
                error: (jqXHR, exception) => {
                    let verrors = '';
                    $.each(jqXHR.responseJSON.errors, function (key, value) {
                        verrors += value;
                    });
                    //showMsg(verrors, 'error');
                }
            })

        })

    </script>
@endsection
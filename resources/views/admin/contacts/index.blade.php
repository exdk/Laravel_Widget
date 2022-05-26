@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h5>{{ trans('cruds.contact.title') }}</h5>
    </div>
    <div class="card-body">
        <h6>
            Справка по использованию системы находится</h6>
            <a target="_blank" href="https://7rights.ru">здесь</a>.
        </p>
    </div>
    <div class="card-body">
        <h6>
            Время работы службы поддержки:</h6>
        <p>
            ПН-ВС с 8:00 по 20:00 по Московскому времени.
        </p>
    </div>
    <div class="card-body">
        <h6>
            Многоканальный телефон службы поддержки:        </h6> <p>
            <a href="tel:+7 495 000 0000">+7 495 000 0000</a>
        </p>
    </div>
    <div class="card-body">
        <h6>
            Адрес компании :        </h6> <p>
            <a target="_blank" href="https://yandex.ru/maps/?source=exp-counterparty_entity&text=119049,%20%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0%20%D0%93%D0%BE%D1%80%D0%BE%D0%B4,%20%D1%83%D0%BB.%20%D0%9C%D1%8B%D1%82%D0%BD%D0%B0%D1%8F,%20%D0%B4.%2028,%20%D1%81%D1%82%D1%80.%203">119049, Москва Город, ул. Мытная, д. 28, стр. 3</a>
        </p>
    </div>
        <div class="card-body">
        <h6>
            ООО "СЕВЕН РАЙТС ЛОГИСТИКС" 2022</h6>
    </div>

</div>



@endsection
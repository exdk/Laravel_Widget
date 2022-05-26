ymaps.ready(init);

function init() {
    var suggestView5 = new ymaps.SuggestView('factadr');
     // Задаем собственный провайдер поисковых подсказок и максимальное количество результатов.
    var suggestView2 = new ymaps.SuggestView('marka', {provider: provider, results: 3});
}
// 
//https://yandex.ru/dev/maps/jsbox/2.1/suggest/
//https://codepen.io/dadata/pen/LYRvQjL
$("#megdu").suggestions({
  // Замените на свой API-ключ
  token: "e3a3f044294bfb454d0b462a79d90f35da6de43d",
  type: "ADDRESS",
  hint: false,
  bounds: "region-city"
});
$("#birth_place").suggestions({
  // Замените на свой API-ключ
  token: "e3a3f044294bfb454d0b462a79d90f35da6de43d",
  type: "ADDRESS",
  hint: false,
  bounds: "region-city"
});
$("#geogorod").suggestions({
  // Замените на свой API-ключ
  token: "e3a3f044294bfb454d0b462a79d90f35da6de43d",
  type: "ADDRESS",
  hint: false,
  bounds: "region-city"
});
$("#factadr").suggestions({
  // Замените на свой API-ключ
  token: "e3a3f044294bfb454d0b462a79d90f35da6de43d",
  type: "ADDRESS",
  hint: false,
  bounds: "address"
});
$("#adr_pro").suggestions({
  // Замените на свой API-ключ
  token: "e3a3f044294bfb454d0b462a79d90f35da6de43d",
  type: "ADDRESS",
  hint: false,
  bounds: "address"
});
$("#pro_vr_adr").suggestions({
  // Замените на свой API-ключ
  token: "e3a3f044294bfb454d0b462a79d90f35da6de43d",
  type: "ADDRESS",
  hint: false,
  bounds: "address"
});
$("#vu_gorod").suggestions({
  // Замените на свой API-ключ
  token: "e3a3f044294bfb454d0b462a79d90f35da6de43d",
  type: "ADDRESS",
  hint: false,
  bounds: "region-city"
});
$("#email").suggestions({
        token: "e3a3f044294bfb454d0b462a79d90f35da6de43d",
        type: "EMAIL",
        /* Вызывается, когда пользователь выбирает одну из подсказок */
        onSelect: function(suggestion) {
            console.log(suggestion);
        }
    });
// Замените на свой API-ключ
var token = "e3a3f044294bfb454d0b462a79d90f35da6de43d";

function join(arr /*, separator */) {
  var separator = arguments.length > 1 ? arguments[1] : ", ";
  return arr.filter(function(n){return n}).join(separator);
}

function typeDescription(type) {
  var TYPES = {
    'INDIVIDUAL': 'Индивидуальный предприниматель',
    'LEGAL': 'Организация'
  }
  return TYPES[type];
}

function showSuggestionnn(suggestion) {
  console.log(suggestion);
  var data = suggestion.data;
  if (!data)
    return;
  
  $("#type0").text(
    typeDescription(data.type) + " (" + data.type + ")"
  );

  if (data.name) {
    $("#hortname").val(data.name.short_with_opf || "");
    $("#longname").val(data.name.full_with_opf || "");
    $("#innfio").val(data.name.short_with_opf || "");
  }
    
if (data.management){
    $("#direktor").val(data.management.name || "");
}
  $("#innkpp").val(data.inn || "");
  $("#innogrn").val(data.ogrn || "");
  $("#datet").val(new Date(data.ogrn_date).toLocaleDateString('ru-RU'));
  $("#kpp").val(data.kpp || "");
  $("#oporg").val(data.okved);
  
  if (data.address) {
    var address = "";
    if (data.address.data.qc == "0") {
      address = join([data.address.data.postal_code, data.address.value]);
    } else {
      address = data.address.data.source;
    }
    $("#uradres").val(address);
  }
}


$("#hortname").suggestions({
  token: token,
  type: "PARTY",
  count: 5,
  /* Вызывается, когда пользователь выбирает одну из подсказок */
  onSelect: showSuggestionnn
});
$("#innfio").suggestions({
  token: token,
  type: "PARTY",
  count: 5,
  /* Вызывается, когда пользователь выбирает одну из подсказок */
  onSelect: showSuggestion
});


function showSuggestionb(suggestion) {
  console.log(suggestion);
  var data = suggestion.data;
  if (!data)
    return;
  $("#name_payment").val(data.name && data.name.payment || "");
  $("#name_full").val(data.name && data.name.full || "");
  $("#bik").val(data.bic);
  $("#swift").val(data.swift);
  $("#korhet").val(data.correspondent_account);
  $("#address").val(data.address.value);
  $("#bank").val(data.name && data.name.payment || "");
}

$("#bik").suggestions({
  token: token,
  type: "BANK",
  count: 5,
  /* Вызывается, когда пользователь выбирает одну из подсказок */
  onSelect: showSuggestionb
});

function init($surname, $name, $patronymic) {
  var self = {};
  self.$surname = $surname;
  self.$name = $name;
  self.$patronymic = $patronymic;
  var fioParts = ["SURNAME", "NAME", "PATRONYMIC"];
  $.each([$surname, $name, $patronymic], function(index, $el) {
    var sgt = $el.suggestions({
      token: token,
      type: "NAME",
      triggerSelectOnSpace: false,
      hint: "",
      noCache: true,
      params: {
        // каждому полю --- соответствующая подсказка
        parts: [fioParts[index]]
      },
      onSearchStart: function(params) {
        // если пол известен на основании других полей,
        // используем его
        var $el = $(this);
        params.gender = isGenderKnown.call(self, $el) ? self.gender : "UNKNOWN";
      },
      onSelect: function(suggestion) {
        // определяем пол по выбранной подсказке
        self.gender = suggestion.data.gender;
        showGender(self.gender);
      }
    });
  });
}

// Проверяет, известен ли пол на данный момент
function isGenderKnown($el) {
  var self = this;
  var surname = self.$surname.val(),
      name = self.$name.val(),
      patronymic = self.$patronymic.val();
  if (($el.attr('id') == self.$surname.attr('id') && !name && !patronymic) ||
      ($el.attr('id') == self.$name.attr('id') && !surname && !patronymic) ||
      ($el.attr('id') == self.$patronymic.attr('id') && !surname && !name)) {
    return false;
  } else {
    return true;
  }
}

function showGender(gender) {
  var genderRu = gender == "MALE" ? "мужской" : gender == "FEMALE" ? "женский" : "не определен";
  $("#gender").text(genderRu);
}

init($("#fam"), $("#name"), $("#oth"));

var $city   = $("#gorod");
var $street = $("#ulitca");
var $house  = $("#dom");

// город и населенный пункт
$city.suggestions({
  token: token,
  type: "ADDRESS",
  hint: false,
  bounds: "city-settlement"
});

// улица
$street.suggestions({
  token: token,
  type: "ADDRESS",
  hint: false,
  bounds: "street",
  constraints: $city
});

// дом
$house.suggestions({
  token: token,
  type: "ADDRESS",
  hint: false,
  noSuggestionsHint: false,
  bounds: "house",
  constraints: $street
});


function formatResult(value, currentValue, suggestion) {
  suggestion.value = suggestion.data.code;
  return suggestion.data.code + " — " + suggestion.data.name;
}

function showSuggestion(suggestion) {
  console.log(suggestion);
  $("#pa_by").val(suggestion.data.name);
}

function clearSuggestion() {
  $("#pa_by").val("");
}

$("#pa_kod").suggestions({
  token: token,
  type: "fms_unit",
  formatResult: formatResult,
  onSelect: showSuggestion,
  onSelectNothing: clearSuggestion
});

$("#own_inn").suggestions({
  token: token,
  type: "PARTY",
  count: 5,
  /* Вызывается, когда пользователь выбирает одну из подсказок */
  onSelect: showSuggestion
});
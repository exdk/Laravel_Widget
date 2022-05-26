<?php
require_once __DIR__.'/config.php';

function valid_empty($option, $data, $class_div, $class_input){
	if ($data == "") $response = "";
	else $response = $option.''.$data.'<br/>';
	return $response;
}

if (isset($_POST['check'])){

	$headers = array();
	$headers[] = 'Content-Type: application/json';
	$headers[] = 'Accept: application/json';
	$headers[] = 'Authorization: Token '.$token_data;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://suggestions.dadata.ru/suggestions/api/4_1/rs/findById/party');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, '{"query": "'.$_POST['inn_ogrn'].'"}');
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$result = json_decode(curl_exec($ch));
	curl_close($ch);
	$output = "";

	foreach ($result->suggestions as $value_api){

		$output .= '<div class="text-center text-bold row">'.$value_api->data->name->short_with_opf.'</div>';
		$output .= valid_empty("Полное наименование компании: ", $value_api->data->name->full_with_opf, "row", "");
		$output .= valid_empty("Полное наименование без ОПФ: ", $value_api->data->name->full, "row", "");
		$output .= valid_empty("Краткое наименование компании: ", $value_api->data->name->short, "row", "");
		if (isset($value_api->data->citizenship->code)){
			$output .= '<div class="text">Гражданство ИП:</div>';
			$output .= valid_empty("&emsp;Полное наименование страны: ", $value_api->data->citizenship->name->full, "row", "");
			$output .= valid_empty("&emsp;Краткое наименование страны: ", $value_api->data->citizenship->name->short, "row", "");
			$output .= valid_empty("&emsp;Числовой код страны по ОКСМ: ", $value_api->data->citizenship->code->numeric, "row", "");
			$output .= valid_empty("&emsp;Трехбуквенный код страны по ОКСМ: ", $value_api->data->citizenship->code->alpha_3, "row", "");
		} 
		$organization = $value_api->data->type;
		if ($organization == "INDIVIDUAL") {
			$output .= valid_empty("Тип организации: ", "Индивидуальный предприниматель", "row", "");
			$output .= valid_empty("ФИО индивидуального предпринимателя: ", $value_api->data->fio->surname." ".$value_api->data->fio->name." ".$value_api->data->fio->patronymic, "row", "");
		}else if ($organization == "LEGAL"){
			$output .= valid_empty("Тип организации: ", "Юридическое лицо", "row", "");
			if (isset($value_api->data->management)) $tmp_array = (array)$value_api->data->management;
			else $tmp_array = [];
			if (!empty($tmp_array)) {
				$output .= '<div class="text">Руководитель:</div>';
				$output .= valid_empty("&emsp;ФИО руководителя: ", $value_api->data->management->name, "row", "");
				$output .= valid_empty("&emsp;Должность руководителя: ", $value_api->data->management->post, "row", "");
			}
		}

		if (isset($value_api->data->managers)) $tmp_array = (array)$value_api->data->managers;
		else $tmp_array = [];
		if (!empty($tmp_array)) {
			$output .= '<div class="text">Руководители компании:</div>';
			foreach ($value_api->data->managers as $value_managers){
				$output .= valid_empty("&emsp;ФИО руководителя (для физлиц): ", $value_managers->fio->source, "row", "");
				$output .= valid_empty("&emsp;Пол: ", $gender[$value_managers->fio->gender], "row", "");
				$output .= valid_empty("&emsp;Наименование руководителя (для юрлиц): ", (isset($value_managers->name) ? $value_managers->name : ""), "row", "");
				$output .= valid_empty("&emsp;Должность руководителя (для физлиц): ", (isset($value_managers->post) ? $value_managers->post : ""), "row", "");
				$output .= valid_empty("&emsp;ОГРН руководителя (для юрлиц): ", (isset($value_managers->ogrn) ? $value_managers->ogrn : ""), "row", "");
				$output .= valid_empty("&emsp;ИНН руководителя: ", $value_managers->inn, "row", "");
				$output .= valid_empty("&emsp;Внутренний идентификатор: ", $value_managers->hid, "row", "");
				$output .= valid_empty("&emsp;Тип руководителя: ", $managers[$value_managers->type], "row", "");
			}
		}

		if (isset($value_api->data->founders)) $tmp_array = (array)$value_api->data->founders;
		else $tmp_array = [];
		if (!empty($tmp_array)) {
			$output .= '<div class="text">Учредители компании:</div>';
			foreach ($value_api->data->founders as $value_founders){
				$output .= valid_empty("&emsp;Наименование учредителя (для юрлиц): ", (isset($value_founders->name) ? $value_founders->name : ""), "row", "");
				$output .= valid_empty("&emsp;&emsp;ОГРН учредителя (для юрлиц): ", (isset($value_founders->ogrn) ? $value_founders->ogrn : ""), "row", "");
				$output .= valid_empty("&emsp;&emsp;ФИО учредителя (для физлиц): ", (isset($value_founders->fio) ? $value_founders->fio->surname. " ".$value_founders->fio->name." ".$value_founders->fio->patronymic : ""), "row", "");
				$output .= valid_empty("&emsp;&emsp;ИНН учредителя: ", $value_founders->inn, "row", "");
				$output .= valid_empty("&emsp;&emsp;Внутренний идентификатор: ", (isset($value_founders->hid) ? $value_founders->hid : ""), "row", "");
				$output .= valid_empty("&emsp;&emsp;Тип учредителя: ", (isset($value_founders->type) ? $data_founders[$value_founders->type] : ""), "row", "");
				$output .= '<div class="text">&emsp;&emsp;Доля учредителя:</div>';
				$output .= valid_empty("&emsp;&emsp;&emsp;Тип значения: ", (isset($value_founders->share->type) ? $data_founders_share[$value_founders->share->type] : ""), "row", "");
				$output .= valid_empty("&emsp;&emsp;&emsp;Значение: ", (isset($value_founders->share->value) ? $value_founders->share->value : ""), "row", "");
				$output .= valid_empty("&emsp;&emsp;&emsp;Числитель дроби: ", (isset($value_founders->share->numerator) ? $value_founders->share->numerator : ""), "row", "");
				$output .= valid_empty("&emsp;&emsp;&emsp;Знаменатель дроби: ", (isset($value_founders->share->denominator) ? $value_founders->share->denominator : ""), "row", "");
			}
		}
		if (isset($value_api->data->management->disqualified)) {
				$output .= valid_empty("Наличие дисквалифицированных лиц в руководстве компании.: ", ($value_api->data->management->disqualified == true ? "Да" : "Нет"), "row", "");
		}
		if (isset($value_api->data->finance->tax_system)) $output .= valid_empty("	: ", $finance_tax_system[$value_api->data->finance->tax_system], "row", "");

		$output .= valid_empty("ИНН: ", $value_api->data->inn, "row", "");
		$output .= valid_empty("КПП: ", (isset($value_api->data->kpp) ? $value_api->data->kpp : "") , "row", "");
		$output .= valid_empty("ОГРН: ", $value_api->data->ogrn, "row", "");
		$output .= valid_empty("Дата выдачи ОГРН: ", date('d-m-Y', $value_api->data->ogrn_date / 1000), "row", "");
		$output .= valid_empty("Код ОКАТО: ", $value_api->data->okato, "row", "");
		$output .= valid_empty("Код ОКТМО: ", $value_api->data->oktmo, "row", "");
		$output .= valid_empty("Код ОКПО: ", $value_api->data->okpo, "row", "");
		$output .= valid_empty("Код ОКОГУ: ", $value_api->data->okogu, "row", "");
		$output .= valid_empty("Код ОКФС: ", $value_api->data->okfs, "row", "");
		$output .= valid_empty("Код ОКВЭД: ", $value_api->data->okved, "row", "");
		$output .= valid_empty("Версия справочника ОКВЭД: ", $value_api->data->okved_type, "row", "");

		if (isset($value_api->data->okveds)) $tmp_array = (array)$value_api->data->okveds;
		else $tmp_array = [];
		if (!empty($tmp_array)) {
			$output .= '<div class="text">Коды ОКВЭД дополнительных видов деятельности:</div>';
			foreach ($value_api->data->okveds as $value_okveds){
				$output .= valid_empty("&emsp;Наименование по справочнику: ", $value_okveds->name, "row", "");
				$output .= valid_empty("&emsp;&emsp;Основной или нет: ", $yes_no[$value_okveds->main], "row", "");
				$output .= valid_empty("&emsp;&emsp;Версия справочника ОКВЭД: ", $value_okveds->type, "row", "");
				$output .= valid_empty("&emsp;&emsp;Код по справочнику: ", $value_okveds->code, "row", "");
			}
		}

		if (isset($value_api->data->capital)) $tmp_array = (array)$value_api->data->capital;
		else $tmp_array = [];
		if (!empty($tmp_array)) {
			$output .= '<div class="text">Уставной капитал компании:</div>';
			$output .= valid_empty("&emsp;Тип капитала: ", $value_api->data->capital->type, "row", "");
			$output .= valid_empty("&emsp;Размер капитала: ", number_format($value_api->data->capital->value, 2, ',', ' '), "row", "");
		}

		if (isset($value_api->data->finance)) $tmp_array = (array)$value_api->data->finance;
		else $tmp_array = [];
		if (!empty($tmp_array)) {
			$output .= '<div class="text">Уставной капитал компании:</div>';
			$output .= valid_empty("&emsp;Тип капитала: ", (isset($value_api->data->capital->type) ? $value_api->data->capital->type : "-"), "row", "");
			$output .= valid_empty("&emsp;Размер капитала: ", (isset($value_api->data->capital->value) ? number_format($value_api->data->capital->value, 2, ',', ' ') : "-"), "row", "");
		}

		if (isset($value_api->data->predecessors)) $tmp_array = (array)$value_api->data->predecessors;
		else $tmp_array = [];
		if (!empty($tmp_array)) {
			$output .= '<div class="text">Правопредшественники, только для юрлиц:</div>';
			foreach ($value_api->data->predecessors as $value_predecessors){
				$output .= valid_empty("&emsp;Наименование предшественника: ", $value_predecessors->name, "row", "");
				$output .= valid_empty("&emsp;&emsp;ИНН предшественника: ", $value_predecessors->inn, "row", "");
				$output .= valid_empty("&emsp;&emsp;ОГРН предшественника: ", $value_predecessors->ogrn, "row", "");
			}
		}

		if (isset($value_api->data->successors)) $tmp_array = (array)$value_api->data->successors;
		else $tmp_array = [];
		if (!empty($tmp_array)) {
			$output .= '<div class="text">Правопреемники, только для юрлиц:</div>';
			foreach ($value_api->data->successors as $value_successors){
				$output .= valid_empty("&emsp;Наименование преемника: ", $value_successors->name, "row", "");
				$output .= valid_empty("&emsp;&emsp;ИНН преемника: ", $value_successors->inn, "row", "");
				$output .= valid_empty("&emsp;&emsp;ОГРН преемника: ", $value_successors->ogrn, "row", "");
			}
		}

		if (isset($value_api->data->finance->year)){
			$output .= '<div class="text">Финансовые показатели за год:</div>';
			$output .= valid_empty("&emsp;Год бух. отчетности: ", $value_api->data->finance->year, "row", "");
			$output .= valid_empty("&emsp;Доходы по бух. отчетности: ", number_format($value_api->data->finance->income, 2, ',', ' '), "row", "");
			$output .= valid_empty("&emsp;Расходы по бух. отчетности: ", number_format($value_api->data->finance->expense, 2, ',', ' '), "row", "");
			$output .= valid_empty("&emsp;Недоимки по налогам: ", number_format($value_api->data->finance->debt, 2, ',', ' '), "row", "");
			$output .= valid_empty("&emsp;Налоговые штрафы: ", number_format($value_api->data->finance->penalty, 2, ',', ' '), "row", "");
		}
		$first = 0;
		if (isset($value_api->data->authorities->fts_registration)) {
			if ($first == 0){
				$first = 1;
				$output .= '<div class="text">Сведения о налоговой, ПФР и ФСС:</div>';
			}
			$output .= '<div class="text">&emsp;ИФНС регистрации:</div>';
			$output .= valid_empty("&emsp;&emsp;Код гос. органа: ", $value_api->data->authorities->fts_registration->type, "row", "");
			$output .= valid_empty("&emsp;&emsp;Код отделения: ", $value_api->data->authorities->fts_registration->code, "row", "");
			$output .= valid_empty("&emsp;&emsp;Наименование отделения: ", $value_api->data->authorities->fts_registration->name, "row", "");
			$output .= valid_empty("&emsp;&emsp;Адрес отделения одной строкой: ", $value_api->data->authorities->fts_registration->address, "row", "");
		}
		if (isset($value_api->data->authorities->fts_registration)) {
			if ($first == 0){
				$first = 1;
				$output .= '<div class="text">Сведения о налоговой, ПФР и ФСС:</div>';
			}
			$output .= '<div class="text">&emsp;Сведения о ИФНС отчётности:</div>';
			$output .= valid_empty("&emsp;&emsp;Код гос. органа: ", $value_api->data->authorities->fts_report->type, "row", "");
			$output .= valid_empty("&emsp;&emsp;Код отделения: ", $value_api->data->authorities->fts_report->code, "row", "");
			$output .= valid_empty("&emsp;&emsp;Наименование отделения: ", $value_api->data->authorities->fts_report->name, "row", "");
			$output .= valid_empty("&emsp;&emsp;Адрес отделения одной строкой: ", $value_api->data->authorities->fts_report->address, "row", "");
		}
		if (isset($value_api->data->authorities->pf)) {
			if ($first == 0){
				$first = 1;
				$output .= '<div class="text">Сведения о налоговой, ПФР и ФСС:</div>';
			}
			$output .= '<div class="text">&emsp;Отделение Пенсионного фонда:</div>';
			$output .= valid_empty("&emsp;&emsp;Код гос. органа: ", $value_api->data->authorities->pf->type, "row", "");
			$output .= valid_empty("&emsp;&emsp;Код отделения: ", $value_api->data->authorities->pf->code, "row", "");
			$output .= valid_empty("&emsp;&emsp;Наименование отделения: ", $value_api->data->authorities->pf->name, "row", "");
			$output .= valid_empty("&emsp;&emsp;Адрес отделения одной строкой: ", $value_api->data->authorities->pf->address, "row", "");
		}
		if (isset($value_api->data->authorities->sif)) {
			if ($first == 0){
				$first = 1;
				$output .= '<div class="text">Сведения о налоговой, ПФР и ФСС:</div>';
			}
			$output .= '<div class="text">&emsp;Отделение Фонда соц. страхования:</div>';
			$output .= valid_empty("&emsp;&emsp;Код гос. органа: ", $value_api->data->authorities->sif->type, "row", "");
			$output .= valid_empty("&emsp;&emsp;Код отделения: ", $value_api->data->authorities->sif->code, "row", "");
			$output .= valid_empty("&emsp;&emsp;Наименование отделения: ", $value_api->data->authorities->sif->name, "row", "");
			$output .= valid_empty("&emsp;&emsp;Адрес отделения одной строкой: ", $value_api->data->authorities->sif->address, "row", "");
		}
		if (isset($value_api->data->documents->fts_registration)) {
			$first = 1;
			$output .= '<div class="text">Документы:</div>';
			$output .= '<div class="text">&emsp;Свидетельство о регистрации в налоговой:</div>';
			$output .= valid_empty("&emsp;&emsp;Тип документа: ", $value_api->data->documents->fts_registration->type, "row", "");
			$output .= valid_empty("&emsp;&emsp;Серия документа: ", $value_api->data->documents->fts_registration->series, "row", "");
			$output .= valid_empty("&emsp;&emsp;Номер документа: ", $value_api->data->documents->fts_registration->number, "row", "");
			$output .= valid_empty("&emsp;&emsp;Дата выдачи: ", date('d-m-Y', $value_api->data->documents->fts_registration->issue_date/1000), "row", "");
			$output .= valid_empty("&emsp;&emsp;Код подразделения: ", $value_api->data->documents->fts_registration->issue_authority, "row", "");
		}
		if (isset($value_api->data->documents->fts_report)) {
			if ($first == 0){
				$first = 1;
				$output .= '<div class="text">Документы:</div>';
			}
			$output .= '<div class="text">&emsp;Сведения об учете в налоговом органе:</div>';
			$output .= valid_empty("&emsp;&emsp;Тип документа: ", $value_api->data->documents->fts_report->type, "row", "");
			$output .= valid_empty("&emsp;&emsp;Серия документа: ", $value_api->data->documents->fts_report->series, "row", "");
			$output .= valid_empty("&emsp;&emsp;Номер документа: ", $value_api->data->documents->fts_report->number, "row", "");
			$output .= valid_empty("&emsp;&emsp;Дата выдачи: ", date('d-m-Y', $value_api->data->documents->fts_report->issue_date/1000), "row", "");
			$output .= valid_empty("&emsp;&emsp;Код подразделения: ", $value_api->data->documents->fts_report->issue_authority, "row", "");
		}
		if (isset($value_api->data->documents->pf_registration)) {
			if ($first == 0){
				$first = 1;
				$output .= '<div class="text">Документы:</div>';
			}
			$output .= '<div class="text">&emsp;Свидетельство о регистрации в Пенсионном фонде:</div>';
			$output .= valid_empty("&emsp;&emsp;Тип документа: ", $value_api->data->documents->pf_registration->type, "row", "");
			$output .= valid_empty("&emsp;&emsp;Серия документа: ", $value_api->data->documents->pf_registration->series, "row", "");
			$output .= valid_empty("&emsp;&emsp;Номер документа: ", $value_api->data->documents->pf_registration->number, "row", "");
			$output .= valid_empty("&emsp;&emsp;Дата выдачи: ", date('d-m-Y', $value_api->data->documents->pf_registration->issue_date/1000), "row", "");
			$output .= valid_empty("&emsp;&emsp;Код подразделения: ", $value_api->data->documents->pf_registration->issue_authority, "row", "");
		}
		if (isset($value_api->data->documents->sif_registration)) {
			if ($first == 0){
				$first = 1;
				$output .= '<div class="text">Документы:</div>';
			}
			$output .= '<div class="text">&emsp;Свидетельство о регистрации в Фонде соц. страхования:</div>';
			$output .= valid_empty("&emsp;&emsp;Тип документа: ", $value_api->data->documents->sif_registration->type, "row", "");
			$output .= valid_empty("&emsp;&emsp;Серия документа: ", $value_api->data->documents->sif_registration->series, "row", "");
			$output .= valid_empty("&emsp;&emsp;Номер документа: ", $value_api->data->documents->sif_registration->number, "row", "");
			$output .= valid_empty("&emsp;&emsp;Дата выдачи: ", date('d-m-Y', $value_api->data->documents->sif_registration->issue_date/1000), "row", "");
			$output .= valid_empty("&emsp;&emsp;Код подразделения: ", $value_api->data->documents->sif_registration->issue_authority, "row", "");
		}

		if (isset($value_api->data->documents->smb)) $tmp_array = (array)$value_api->data->documents->smb;
		else $tmp_array = [];
		if (!empty($tmp_array)) {
			$output .= '<div class="text">Запись в реестре малого и среднего предпринимательства:</div>';
			$output .= valid_empty("&emsp;&emsp;Категория предприятия: ", $category_smb[$value_api->data->documents->smb->category], "row", "");
			$output .= valid_empty("&emsp;&emsp;Тип документа: ", $value_api->data->documents->smb->type, "row", "");
			$output .= valid_empty("&emsp;&emsp;Серия: ", $value_api->data->documents->smb->series, "row", "");
			$output .= valid_empty("&emsp;&emsp;Номер: ", $value_api->data->documents->smb->number, "row", "");
			$output .= valid_empty("&emsp;&emsp;Название органа: ", $value_api->data->documents->smb->issue_authority, "row", "");
			$output .= valid_empty("&emsp;&emsp;Дата регистрации в реестре: ", date('d-m-Y', $value_api->data->documents->smb->issue_date/1000), "row", "");
		}
		$output .= '<div class="text">Организационно-правовая форма:</div>';
		$output .= valid_empty("&emsp;Полное название ОПФ: ", $value_api->data->opf->full, "row", "");
		$output .= valid_empty("&emsp;Краткое название ОПФ: ", $value_api->data->opf->short, "row", "");
		$output .= valid_empty("&emsp;Код ОКОПФ: ", $value_api->data->opf->code, "row", "");
		$output .= valid_empty("&emsp;Версия справочника ОКОПФ: ", $value_api->data->opf->type, "row", "");
		$output .= valid_empty("Внутренний идентификатор в Дадате: ", $value_api->data->hid, "row", "");
		if (isset($value_api->data->branch_count)) {
			$output .= valid_empty("Количество филиалов: ", $value_api->data->branch_count, "row", "");
			$output .= valid_empty("Тип подразделения: ", ($value_api->data->branch_type == "MAIN" ? "Головная организация" : "Филиал"), "row", "");
		}
		$output .= '<div class="text">Состояние:</div>';
		$output .= valid_empty("&emsp;Дата регистрации: ", ($value_api->data->state->registration_date != "" ? date('d-m-Y', $value_api->data->state->registration_date/1000) : ""), "row", "");
		$output .= valid_empty("&emsp;Дата последних изменений: ", date('d-m-Y', $value_api->data->state->actuality_date/1000), "row", "");
		$output .= valid_empty("&emsp;Дата ликвидации: ", ($value_api->data->state->liquidation_date != "" ? date('d-m-Y', $value_api->data->state->liquidation_date/1000) : ""), "row", "");
		$output .= valid_empty("&emsp;Статус организации: ", $status_orgnz[$value_api->data->state->status], "row", "");
		if (isset($value_api->data->state->code)) $output .= valid_empty("&emsp;Детальный статус: ", $status_ext[$value_api->data->state->code], "row", "");

		if (isset($value_api->data->licenses)) $tmp_array = (array)$value_api->data->licenses;
		else $tmp_array = [];
		if (!empty($tmp_array)) {
			$output .= '<div class="text">Лицензии:</div>';
			foreach ($value_api->data->licenses as $value_licenses){
				$output .= valid_empty("&emsp;Название выдавшего органа: ", $value_licenses->issue_authority, "row", "");
				$output .= valid_empty("&emsp;&emsp;Серия документа: ", $value_licenses->series, "row", "");
				$output .= valid_empty("&emsp;&emsp;Номер документа: ", $value_licenses->number, "row", "");
				$output .= valid_empty("&emsp;&emsp;Дата выдачи: ", (isset($value_licenses->issue_date) ? date('d-m-Y', $value_licenses->issue_date/1000) : ""), "row", "");
				$output .= valid_empty("&emsp;&emsp;Дата приостановки: ", (isset($value_licenses->suspend_date) ? date('d-m-Y', $value_licenses->suspend_date/1000) : ""), "row", "");
				$output .= valid_empty("&emsp;&emsp;Название приостановившего органа: ", $value_licenses->suspend_authority, "row", "");
				$output .= valid_empty("&emsp;&emsp;Дата начала действия: ", (isset($value_licenses->valid_from) ? date('d-m-Y', $value_licenses->valid_from/1000) : ""), "row", "");
				$output .= valid_empty("&emsp;&emsp;Дата окончания действия: ", (isset($value_licenses->valid_to) ? date('d-m-Y', $value_licenses->valid_to/1000) : ""), "row", "");
				if (isset($value_licenses->activities)) {
					$output .= '<div class="text">&emsp;&emsp;&emsp;Перечень лицензируемых видов деятельности:</div>';
					foreach ($value_licenses->activities as $value_licenses_activities){
						$output .= valid_empty("&emsp;&emsp;&emsp;&emsp;", $value_licenses_activities, "row", "");
					}
				}	
				if (isset($value_licenses->addresses)) {
					$output .= '<div class="text">&emsp;&emsp;&emsp;Перечень адресов, по которым действует лицензия:</div>';
					foreach ($value_licenses->addresses as $value_licenses_addresses){
						$output .= valid_empty("&emsp;&emsp;&emsp;&emsp;", $value_licenses_addresses, "row", "");
					}
				}	

			}
		}

		$output .= '<div class="text">Адрес:</div>';
		$output .= valid_empty("&emsp;Код проверки адреса: ", $address_qc[$value_api->data->address->data->qc], "row", "");
		$output .= valid_empty("&emsp;Адрес одной строкой: ", $value_api->data->address->value, "row", "");
		$output .= valid_empty("&emsp;Адрес одной строкой (полный, с индексом): ", $value_api->data->address->unrestricted_value, "row", "");
		$output .= '<div class="text">&emsp;Гранулярный адрес:</div>';
		$output .= valid_empty("&emsp;&emsp;Адрес одной строкой как в ЕГРЮЛ: ", $value_api->data->address->data->source, "row", "");
		$output .= valid_empty("&emsp;&emsp;Индекс: ", $value_api->data->address->data->postal_code, "row", "");
		$output .= valid_empty("&emsp;&emsp;Страна: ", $value_api->data->address->data->country, "row", "");
		$output .= valid_empty("&emsp;&emsp;ISO-код страны: ", $value_api->data->address->data->country_iso_code, "row", "");
		$output .= valid_empty("&emsp;&emsp;Федеральный округ: ", $value_api->data->address->data->federal_district, "row", "");
		$output .= valid_empty("&emsp;&emsp;Код ФИАС региона: ", $value_api->data->address->data->region_fias_id, "row", "");
		$output .= valid_empty("&emsp;&emsp;Код КЛАДР региона: ", $value_api->data->address->data->region_kladr_id, "row", "");
		$output .= valid_empty("&emsp;&emsp;ISO-код региона: ", $value_api->data->address->data->region_iso_code, "row", "");
		$output .= valid_empty("&emsp;&emsp;Регион с типом: ", $value_api->data->address->data->region_with_type, "row", "");
		$output .= valid_empty("&emsp;&emsp;Тип региона (сокращенный): ", $value_api->data->address->data->region_type, "row", "");
		$output .= valid_empty("&emsp;&emsp;Тип региона: ", $value_api->data->address->data->region_type_full, "row", "");
		$output .= valid_empty("&emsp;&emsp;Регион: ", $value_api->data->address->data->region, "row", "");
		$output .= valid_empty("&emsp;&emsp;Код ФИАС района в регионе: ", $value_api->data->address->data->area_fias_id, "row", "");
		$output .= valid_empty("&emsp;&emsp;Код КЛАДР района в регионе: ", $value_api->data->address->data->area_kladr_id, "row", "");
		$output .= valid_empty("&emsp;&emsp;Район в регионе с типом: ", $value_api->data->address->data->area_with_type, "row", "");
		$output .= valid_empty("&emsp;&emsp;Тип района в регионе (сокращенный): ", $value_api->data->address->data->area_type, "row", "");
		$output .= valid_empty("&emsp;&emsp;Тип района в регионе: ", $value_api->data->address->data->area_type_full, "row", "");
		$output .= valid_empty("&emsp;&emsp;Район в регионе: ", $value_api->data->address->data->area, "row", "");
		$output .= valid_empty("&emsp;&emsp;Код ФИАС города: ", $value_api->data->address->data->city_fias_id, "row", "");
		$output .= valid_empty("&emsp;&emsp;Код КЛАДР города: ", $value_api->data->address->data->city_kladr_id, "row", "");
		$output .= valid_empty("&emsp;&emsp;Город с типом: ", $value_api->data->address->data->city_with_type, "row", "");
		$output .= valid_empty("&emsp;&emsp;Тип города (сокращенный): ", $value_api->data->address->data->city_type, "row", "");
		$output .= valid_empty("&emsp;&emsp;Тип города: ", $value_api->data->address->data->city_type_full, "row", "");
		$output .= valid_empty("&emsp;&emsp;Город: ", $value_api->data->address->data->city, "row", "");
		$output .= valid_empty("&emsp;&emsp;Код ФИАС района города (заполняется, только если район есть в ФИАС): ", $value_api->data->address->data->city_district_fias_id, "row", "");
		$output .= valid_empty("&emsp;&emsp;Район города с типом: ", $value_api->data->address->data->city_district_with_type, "row", "");
		$output .= valid_empty("&emsp;&emsp;Тип района города (сокращенный): ", $value_api->data->address->data->city_district_type, "row", "");
		$output .= valid_empty("&emsp;&emsp;Тип района города: ", $value_api->data->address->data->city_district_type_full, "row", "");
		$output .= valid_empty("&emsp;&emsp;Район города: ", $value_api->data->address->data->city_district, "row", "");
		$output .= valid_empty("&emsp;&emsp;Код ФИАС нас. пункта: ", $value_api->data->address->data->settlement_fias_id, "row", "");
		$output .= valid_empty("&emsp;&emsp;Код КЛАДР нас. пункта: ", $value_api->data->address->data->settlement_kladr_id, "row", "");
		$output .= valid_empty("&emsp;&emsp;Населенный пункт с типом: ", $value_api->data->address->data->settlement_with_type, "row", "");
		$output .= valid_empty("&emsp;&emsp;Тип населенного пункта (сокращенный): ", $value_api->data->address->data->settlement_type, "row", "");
		$output .= valid_empty("&emsp;&emsp;Тип населенного пункта: ", $value_api->data->address->data->settlement_type_full, "row", "");
		$output .= valid_empty("&emsp;&emsp;Населенный пункт: ", $value_api->data->address->data->settlement, "row", "");
		$output .= valid_empty("&emsp;&emsp;Код ФИАС улицы: ", $value_api->data->address->data->street_fias_id, "row", "");
		$output .= valid_empty("&emsp;&emsp;Код КЛАДР улицы: ", $value_api->data->address->data->street_kladr_id, "row", "");
		$output .= valid_empty("&emsp;&emsp;Улица с типом: ", $value_api->data->address->data->street_with_type, "row", "");
		$output .= valid_empty("&emsp;&emsp;Тип улицы (сокращенный): ", $value_api->data->address->data->street_type, "row", "");
		$output .= valid_empty("&emsp;&emsp;Тип улицы: ", $value_api->data->address->data->street_type_full, "row", "");
		$output .= valid_empty("&emsp;&emsp;Улица: ", $value_api->data->address->data->street, "row", "");
		$output .= valid_empty("&emsp;&emsp;Код ФИАС земельного участка: ", $value_api->data->address->data->stead_fias_id, "row", "");
		$output .= valid_empty("&emsp;&emsp;Код КЛАДР земельного участка: ", (isset($value_api->data->address->data->stead_kladr_id) ? $value_api->data->address->data->stead_kladr_id : ""), "row", "");
		$output .= valid_empty("&emsp;&emsp;уч: ", $value_api->data->address->data->stead_type, "row", "");
		$output .= valid_empty("&emsp;&emsp;участок: ", $value_api->data->address->data->stead_type_full, "row", "");
		$output .= valid_empty("&emsp;&emsp;номер земельного участка: ", $value_api->data->address->data->stead, "row", "");
		$output .= valid_empty("&emsp;&emsp;Код ФИАС дома: ", $value_api->data->address->data->house_fias_id, "row", "");
		$output .= valid_empty("&emsp;&emsp;Код КЛАДР дома: ", $value_api->data->address->data->house_kladr_id, "row", "");
		$output .= valid_empty("&emsp;&emsp;Тип дома (сокращенный): ", $value_api->data->address->data->house_type, "row", "");
		$output .= valid_empty("&emsp;&emsp;Тип дома: ", $value_api->data->address->data->house_type_full, "row", "");
		$output .= valid_empty("&emsp;&emsp;Дом: ", $value_api->data->address->data->house, "row", "");
		$output .= valid_empty("&emsp;&emsp;Тип корпуса/строения (сокращенный): ", $value_api->data->address->data->block_type, "row", "");
		$output .= valid_empty("&emsp;&emsp;Тип корпуса/строения: ", $value_api->data->address->data->block_type_full, "row", "");
		$output .= valid_empty("&emsp;&emsp;Корпус/строение: ", $value_api->data->address->data->block, "row", "");
		$output .= valid_empty("&emsp;&emsp;Код ФИАС квартиры: ", $value_api->data->address->data->flat_fias_id, "row", "");
		$output .= valid_empty("&emsp;&emsp;Тип квартиры (сокращенный): ", $value_api->data->address->data->flat_type, "row", "");
		$output .= valid_empty("&emsp;&emsp;Тип квартиры: ", $value_api->data->address->data->flat_type_full, "row", "");
		$output .= valid_empty("&emsp;&emsp;Квартира: ", $value_api->data->address->data->flat, "row", "");
		$output .= valid_empty("&emsp;&emsp;Абонентский ящик: ", $value_api->data->address->data->postal_box, "row", "");
		$output .= valid_empty("&emsp;&emsp;Код ФИАС для России: ", $value_api->data->address->data->fias_id, "row", "");
		$output .= valid_empty("&emsp;&emsp;Код ФИАС для России: ", $fias_level[$value_api->data->address->data->fias_level], "row", "");
		$output .= valid_empty("&emsp;&emsp;Код КЛАДР: ", $value_api->data->address->data->kladr_id, "row", "");
		$output .= valid_empty("&emsp;&emsp;Идентификатор объекта в базе GeoNames: ", $value_api->data->address->data->geoname_id, "row", "");
		$output .= valid_empty("&emsp;&emsp;Признак центра района или региона: ", $capital_marker[$value_api->data->address->data->capital_marker], "row", "");
		$output .= valid_empty("&emsp;&emsp;Код ОКАТО: ", $value_api->data->address->data->okato, "row", "");
		$output .= valid_empty("&emsp;&emsp;Код ОКТМО: ", $value_api->data->address->data->oktmo, "row", "");
		$output .= valid_empty("&emsp;&emsp;Код ИФНС для физических лиц: ", $value_api->data->address->data->tax_office, "row", "");
		$output .= valid_empty("&emsp;&emsp;Код ИФНС для организаций: ", $value_api->data->address->data->tax_office_legal, "row", "");
		$output .= valid_empty("&emsp;&emsp;Координаты: широта: ", $value_api->data->address->data->geo_lat, "row", "");
		$output .= valid_empty("&emsp;&emsp;Координаты: долгота: ", $value_api->data->address->data->geo_lon, "row", "");
		$output .= valid_empty("&emsp;&emsp;Код точности координат: ", $qc_geo[$value_api->data->address->data->qc_geo], "row", "");
		$output .= valid_empty("&emsp;&emsp;Иерархический код адреса в ФИАС: ", $value_api->data->address->data->fias_code, "row", "");
		if ($value_api->data->address->data->fias_actuality_state == 0) $fias_actuality_state = "Актуальный";
		else if ($value_api->data->address->data->fias_actuality_state > 0 AND $value_api->data->address->data->fias_actuality_state < 51 ) $fias_actuality_state = "Переименован";
		else if ($value_api->data->address->data->fias_actuality_state == 51) $fias_actuality_state = "Переподчинен";
		else if ($value_api->data->address->data->fias_actuality_state == 99) $fias_actuality_state = "Удален";
		$output .= valid_empty("&emsp;&emsp;Признак актуальности адреса в ФИАС: ", $fias_actuality_state, "row", "");
		$output .= valid_empty("&emsp;&emsp;Административный округ: ", $value_api->data->address->data->city_area, "row", "");
		$output .= valid_empty("&emsp;&emsp;Внутри кольцевой: ", (isset($value_api->data->address->data->beltway_hit) ? $beltway_hit[$value_api->data->address->data->beltway_hit] : ""), "row", "");
		$output .= valid_empty("&emsp;&emsp;Расстояние от кольцевой в километрах: ", $value_api->data->address->data->beltway_distance, "row", "");
		$output .= valid_empty("&emsp;&emsp;Площадь квартиры: ", $value_api->data->address->data->flat_area, "row", "");
		$output .= valid_empty("&emsp;&emsp;Рыночная стоимость м²: ", $value_api->data->address->data->square_meter_price, "row", "");
		$output .= valid_empty("&emsp;&emsp;Рыночная стоимость квартиры: ", $value_api->data->address->data->flat_price, "row", "");
		$output .= valid_empty("&emsp;&emsp;Часовой пояс: ", $value_api->data->address->data->timezone, "row", "");
		if (isset($value_api->data->address->data->metro)){
			$output .= '<div class="text">&emsp;&emsp;Список ближайших станций метро:</div>';
			foreach ($value_api->data->address->data->metro as $value_metro){
				$output .= valid_empty("&emsp;&emsp;&emsp;Название станции: ", $value_metro->name, "row", "");
				$output .= valid_empty("&emsp;&emsp;&emsp;&emsp;Название линии: ", $value_metro->line, "row", "");
				$output .= valid_empty("&emsp;&emsp;&emsp;&emsp;Расстояние до станции в километрах: ", $value_metro->distance, "row", "");
			}
		}
		$output .= valid_empty("Среднесписочная численность работников: ", (isset($value_api->data->employee_count) ? $value_api->data->employee_count : ""), "row", "");

		if (isset($value_api->data->phones)) $tmp_array = (array)$value_api->data->phones;
		else $tmp_array = [];
		if (!empty($tmp_array)) {
			$output .= '<div class="text">Телефоны:</div>';
			foreach ($value_api->data->phones as $value_phones){
				$output .= valid_empty("&emsp;Контактное лицо: ", (isset($value_phones->data->contact->name) ? $value_phones->data->contact->name : ""), "row", "");
				$output .= valid_empty("&emsp;&emsp;Номер: ", (isset($value_phones->value) ? $value_phones->value : ""), "row", "");
				$output .= valid_empty("&emsp;&emsp;&emsp;Телефон одной строкой как в ЕГРЮЛ: ", (isset($value_phones->data->source) ? $value_phones->data->source : ""), "row", "");
				$output .= valid_empty("&emsp;&emsp;&emsp;Тип телефона (мобильный, стационарный, ...): ", (isset($value_phones->data->type) ? $value_phones->data->type : ""), "row", "");
				$output .= valid_empty("&emsp;&emsp;&emsp;Код страны: ", (isset($value_phones->data->country_code) ? $value_phones->data->country_code : ""), "row", "");
				$output .= valid_empty("&emsp;&emsp;&emsp;Код города / DEF-код: ", (isset($value_phones->data->city_code) ? $value_phones->data->city_code : ""), "row", "");
				$output .= valid_empty("&emsp;&emsp;&emsp;Локальный номер телефона: ", (isset($value_phones->data->number) ? $value_phones->data->number : ""), "row", "");
				$output .= valid_empty("&emsp;&emsp;&emsp;Оператор связи: ", (isset($value_phones->data->provider) ? $value_phones->data->provider : ""), "row", "");
				$output .= valid_empty("&emsp;&emsp;&emsp;Регион: ", (isset($value_phones->data->region) ? $value_phones->data->region : ""), "row", "");
				$output .= valid_empty("&emsp;&emsp;&emsp;Город (только для стационарных телефонов): ", (isset($value_phones->data->city) ? $value_phones->data->city : ""), "row", "");
				$output .= valid_empty("&emsp;&emsp;&emsp;Часовой пояс: ", (isset($value_phones->data->timezone) ? $value_phones->data->timezone : ""), "row", "");
			}			
		}

		if (isset($value_api->data->emails)) $tmp_array = (array)$value_api->data->emails;
		else $tmp_array = [];
		if (!empty($tmp_array)) {
			$output .= '<div class="text">Адреса эл. почты:</div>';
			foreach ($value_api->data->emails as $value_emails){
				$output .= valid_empty("&emsp;Email одной строкой как в ЕГРЮЛ: ", (isset($value_emails->data->source) ? $value_emails->data->source : ""), "row", "");
				$output .= valid_empty("&emsp;&emsp;Локальная часть адреса (то, что до @): ", (isset($value_emails->data->local) ? $value_emails->data->local : ""), "row", "");
				$output .= valid_empty("&emsp;&emsp;домен (то, что после @): ", (isset($value_emails->data->domain) ? $value_emails->data->domain : ""), "row", "");
			}
		}
	}
	echo json_encode(["status" => 1, "response" => $output]); 
}
?>

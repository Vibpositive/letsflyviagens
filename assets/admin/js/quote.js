$("#original_cost").on('propertychange input', function (e) {
	var valueChanged = false;

	if (e.type == 'propertychange') {
		valueChanged = e.originalEvent.propertyName == 'value';
	} else {
		valueChanged = true;
	}
	if (valueChanged) {
		orc_value = Number(e.currentTarget.value);
		rav_value = Number($("#rav").val());
		tax_value = Number($("#tax").val());
		exc_value = Number($("#exchange").val());

		total = tax_value + rav_value + (exc_value * orc_value);
		$("#total").val(total);
	}
});

$("#rav").on('propertychange input', function (e) {
	var valueChanged = false;

	if (e.type == 'propertychange') {
		valueChanged = e.originalEvent.propertyName == 'value';
	} else {
		valueChanged = true;
	}
	if (valueChanged) {
		rav_value = Number(e.currentTarget.value);
		tax_value = Number($("#tax").val());
		exc_value = Number($("#exchange").val());
		orc_value = Number($("#original_cost").val());

		total = tax_value + rav_value + (exc_value * orc_value);
		$("#total").val(total);
	}
});

$("#tax").on('propertychange input', function (e) {
	var valueChanged = false;

	if (e.type == 'propertychange') {
		valueChanged = e.originalEvent.propertyName == 'value';
	} else {
		valueChanged = true;
	}
	if (valueChanged) {
        tax_value = Number(e.currentTarget.value);
        rav_value = Number($("#rav").val());
        exc_value = Number($("#exchange").val());
        orc_value = Number($("#original_cost").val());

		total = tax_value + rav_value + (exc_value * orc_value);
		$("#total").val(total);
	}
});

$("#exchange").on('propertychange input', function (e) {
	var valueChanged = false;

	if (e.type == 'propertychange') {
		valueChanged = e.originalEvent.propertyName == 'value';
	} else {
		valueChanged = true;
	}
	if (valueChanged) {
		exc_value = Number(e.currentTarget.value);
		orc_value = Number($("#original_cost").val());
		rav_value = Number($("#rav").val());
		tax_value = Number($("#tax").val());

		total = tax_value + rav_value + (exc_value * orc_value);
		$("#total").val(total);
	}
});
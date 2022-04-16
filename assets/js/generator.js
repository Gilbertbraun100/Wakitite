$("#generate").click(function () {
	playsfx();
	document.getElementById("cards").value = gen();
});

function gen() {
	var amt = $("#amount").val();
	var ccs = [];
	for(x = 0; x < amt; x++) {
		ccs.push(generate());
	}
	return ccs.join("\n");
}
function rand(rlength) {
	var randa = [];
	while(randa.length < rlength){
	var rand = Math.floor(Math.random() * 10);
		randa.push(rand);
	}
	return randa.join('');
}

function generate() {
	var bvbin = $("#bin").val();
	var bvmonth = $("#month").val();
	var bvyear = $("#year").val();
	var bvcvv = $("#cvv").val();
	var cci = bvbin + rand(15 - bvbin.length);
	var evena = [];
	var odda = [];
	for(var e = 0; e < 15; e += 2) {
		var even = cci[e] * 2;
		if(even.toString().length == 2){
			even = even.toString().split('');
			even = parseInt(even[0]) + parseInt(even[1]);
		}
	evena.push(even);
	}
	for(var o = 1; o < 15; o += 2) {
		var odd = cci[o];
		odda.push(odd);
	}
	var odds = eval(odda.join('+'));
	var evens = eval(evena.join('+'));
	var total = odds + evens;
	var csum = 10 - total.toString()[1];
	if(csum == 10){
		csum = 0;
	}
	if(fyear(bvyear).length == 4){
	return cci + csum + '|' + fmonth(bvmonth) + '|' + fyear(bvyear) + '|' + fcvv(bvcvv);
	}
	else { 
		return cci + csum + '|' + fmonth(bvmonth) + '|202' + fyear(bvyear) + '|' + fcvv(bvcvv);
	}
}

function fmonth(bvmonth) {
	if(bvmonth) {
	return bvmonth;
	}
	else {
	var bvmonth = Math.floor(Math.random() * 12) + 1;
	if(bvmonth.toString().length == 1){
		bvmonth = '0' + bvmonth;
	}
	return bvmonth;
	}
}
function fyear(bvyear) {
	if(bvyear) {
	return bvyear;
	}
	else {
	return Math.floor(Math.random() * 8) + 2;
	}
}

function fcvv(bvcvv) {
	if(bvcvv) {
	return bvcvv;
	}
	else {
	cvva = [];
	while(cvva.length < 3) {
		var cvv = Math.floor(Math.random() * 10);
		cvva.push(cvv);
	}
	return cvva.join('');
	}
}
function playsfx() {
    var x = document.getElementById("bvsfx");  
    x.play(); 
} 
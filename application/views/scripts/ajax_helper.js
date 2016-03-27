var addAjax = {
	init:function( config ){
		this.config=config;
		this.bindEvents();
	},
	bindEvents:function(){
		this.config.formSubmit.on('click', this.submitData);
	}
	submitData:function(e){
		var self=addAjax;
		return $.ajax({
			url: self.config.url,
			type: 'POST',
			dataType: 'json',
			data: self.config.formData,
		}).promise();
		// .done(function(result) {
		// 	if (result[0]) {
		// 		console.log("success");
		// 	}else{
		// 		console.log("error");
		// 	}
		// });
		// .fail(function() {
		// 	console.log("error");
		// })
		// .always(function() {
		// 	console.log("complete");
		// });
		e.preventDefault();
	},
response.always(function(result) {
	if (result[0]) {
		console.log("success");
	}else{
		console.log("error");
	}
});
};
addAjax.init({
	formSubmit:$('#submit');
	url:"the/url",
	formData:$('#form').form.serialize();
});
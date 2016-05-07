 var nome;
 var id;
 var foto;
 var faculdade;
 
 window.fbAsyncInit = function() {
    FB.init({
      appId      : '1712482102324462',
      xfbml      : true,
      version    : 'v2.6'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

 //salvar dados em base
 function salvarDados(id, nome, foto, faculdade){
	$.post('/conecta/public/usuario/iniciarSessao',
	{id:id, nome: nome, foto: foto, faculdade: faculdade},
	function(data){
		//console.log(data);
	}
	);
 }
 
 //extrair dados
function extrair(){
	FB.api('/me',
			{fields: "id,about,age_range,picture,bio,birthday,context,email,first_name,gender,hometown,link,location,middle_name,name,timezone,website,work"}, 
				function(response) {
				salvarDados(response.id, response.name, '<img src="' + response.picture.data.url + '"> ', response.hometown);
			}
	);
}

$('#bt-facebook').click( function(event){
 
    event.preventDefault();    
    destino = this.href;
 
    FB.login( function(response){
        if (response.authResponse) {
            document.cookie = '1712482102324462='+response.authResponse.userID;
            document.cookie = 'ab478477ff68d9d2b7ad79298ffc586e='+response.authResponse.accessToken;
			extrair()
			//window.location.href = '/conecta/public/turma';
        }else{
            
			alert('NAO LOGOU');
			FB.login();
			// console.log('O usuário Cancelou o login ou não autozirou.');
        }
    }, {scope: 'user_photos, publish_actions, user_education_history, email'});    
});
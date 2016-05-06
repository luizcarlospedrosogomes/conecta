$('#bt-facebook').click( function(event){
 
    event.preventDefault();    
    destino = this.href;
 
    FB.login( function(response){
        if (response.authResponse) {
            document.cookie = '1712482102324462='+response.authResponse.userID;
            document.cookie = 'ab478477ff68d9d2b7ad79298ffc586e='+response.authResponse.accessToken;
            window.location.href = '/conecta/public/turma';
        }else{
            
			alert('NAO LOGOU');
			// console.log('O usuário Cancelou o login ou não autozirou.');
        }
    }, {scope: 'user_photos, publish_actions, user_education_history, email'});    
});
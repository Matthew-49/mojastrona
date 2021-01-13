//sprawdznie poprawnośći danych podanych przy rejestracji 
function sprawdzenie(){
    let f = document.forms.formularz1;
    
    if(f.login.value.length<4 || f.login.value.length>15 ){
        alert('Login musi mieć od 4 do 20 znaków.');
    return;}
    
    if (f.haslo.value.length<6 || f.haslo.value.length>20){
        alert('Hasło musi mieć od 6 do 20 znaków.');
    return;}
    
    if (f.haslo.value != f.haslo2.value){
        alert('Hasła się różnią.');
    return;}
    
    if(f.email.value==""){
        alert('Pole email nie może byc puste.');
    return;}   
    
  
    f.submit();
} 



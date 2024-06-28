function SendOTP(){
    const email =document.getElementById("email");
    const otpverify = document.getElementsByClassName("email-verify")[0];
    
    let otp_code = Math.floor(math.random() * 10000);
    let emailbody = '<h1>your otp is </h1>${otp_code}';
    Email.send({
        SecureToken : "2694e337-8163-4285-8ff7-df33edc7bcd1",
        To : email.value,
        From : "rohitshinde70551@gmail.com.com",
        Subject : "email OTP using js ",
        Body : "And this is the body"
    }).then(
      message => { 
        if(message =="OK"){

            alert("OTP sent to your email"  + email.value);
            
            otpverify.style.display ="flex";
            
            let otp_inp =document.getElementById("otp-input");
            
            let otp_btn =document.getElementById("btn-verify-otp");
            
            otp_btn.addEventListener("click", ()=>{
            
                if(otp_inp.value == otp_code) {

                    alert("Email address verified...");
                    
                    otpverify.style.display ="none";
                    
                    email.value ="";
                    
                    otp_inp.value ="";
                }
                else {
                    alert("invalid OTP")
                }
            })
        } 
    }
  );
}

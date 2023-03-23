class PasswordValidator
{
    #messages = [];
    #numbers = "1234567890";
    #capitals = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    #specialChars = "~!@#$%^&*_-+=`|(){}[]:;\"'<>,.?/";
    
    validate(password)
    {
        if(!(password.length >= 6 && password.length < 100)){
            this.#messages.push("Password is too long or too short.");
        }

        if(!password.split("").some((letter) => this.#capitals.includes(letter))){
            this.#messages.push("Password does not include any capital letters.");
        }

        if(!password.split("").some((letter) => this.#numbers.includes(letter))){
            this.#messages.push("Password does not include any numbers.");
        }

        if(!password.split("").some((letter) => this.#specialChars.includes(letter))){
            this.#messages.push("Password does not include any special characters.");
        }

        return this.#messages;
    }
}